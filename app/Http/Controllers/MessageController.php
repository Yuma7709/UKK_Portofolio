<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MessageController extends Controller
{
    /*
    |-----------------------------------------
    | STORE MESSAGE (CREATE)
    |-----------------------------------------
    */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'kesan' => 'required|string|max:255',
            'pesan' => 'required|string|max:1000',
        ]);

        $token = $this->visitorToken($request);
        $data['owner_token'] = $token;

        Message::create($data);

        return redirect()->to(route('portfolio').'#contact')
            ->with('success_message', 'Terima kasih atas kesan dan pesannya!')
            ->cookie('visitor_token', $token, 525600);
    }

    /*
    |-----------------------------------------
    | UPDATE MESSAGE
    |-----------------------------------------
    */
    public function update(Request $request, $id)
    {
        $message = Message::findOrFail($id);
        abort_unless($this->boleh($request, $message), 403);

        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'kesan' => 'required|string|max:255',
            'pesan' => 'required|string|max:1000',
        ]);

        $message->update($data);

        if (session('admin_login')) {
            return redirect()->to(route('admin.dashboard').'#message-konten')
                ->with('success', 'Pesan berhasil diperbarui.')
                ->with('updated', ['type' => 'message', 'id' => $message->id]);
        }

        return redirect()->to(route('portfolio').'#contact')
            ->with('success_message', 'Perubahan berhasil disimpan.');
    }

    /*
    |-----------------------------------------
    | DELETE MESSAGE
    |-----------------------------------------
    */
    public function destroy(Request $request, $id)
    {
        $message = Message::findOrFail($id);
        abort_unless($this->boleh($request, $message), 403);

        $message->delete();

        return redirect()->back()
            ->with('success', 'Pesan berhasil dihapus.')
            ->with('success_message', 'Pesan berhasil dihapus.');
    }

    /*
    |-----------------------------------------
    | HELPER
    |-----------------------------------------
    */
    private function visitorToken(Request $request): string
    {
        $token = $request->cookie('visitor_token') ?? session('visitor_token');

        if (! $token) {
            $token = (string) Str::uuid();
            session(['visitor_token' => $token]);
        }

        return $token;
    }

    private function boleh(Request $request, Message $message): bool
    {
        if (session('admin_login')) {
            return true;
        }

        $token = $request->cookie('visitor_token') ?? session('visitor_token');

        return $token && $message->owner_token === $token;
    }
}
