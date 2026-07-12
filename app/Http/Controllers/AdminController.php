<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Message;
use App\Models\ContactMessage;

class AdminController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function processLogin(Request $request)
    {
        if ($request->username === 'admin' && $request->password === '12345') {
            session(['admin_login' => true]);
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Login gagal');
    }

    public function dashboard()
    {
        return view('admin.dashboard', [
            'projects' => Project::latest()->get(),
            'messages' => Message::latest()->get(),
            'contacts' => ContactMessage::latest()->get(),
        ]);
    }

    public function logout()
    {
        session()->forget('admin_login');
        return redirect()->route('admin.login');
    }
}