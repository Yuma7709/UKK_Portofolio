<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectFeedback;
use Illuminate\Http\Request;

class ProjectFeedbackController extends Controller
{
    public function store(Request $request, Project $project)
    {
        $data = $request->validate([
            'nama'     => 'required|string|max:100',
            'rating'   => 'required|integer|min:1|max:5',
            'komentar' => 'required|string|max:1000',
        ]);

        $project->feedbacks()->create($data);

        return redirect()
            ->to(route('project.show', $project->id) . '#feedback')
            ->with('success_feedback', 'Terima kasih atas feedback-nya!');
    }

    public function destroy($id)
    {
        $feedback = ProjectFeedback::findOrFail($id);
        $projectId = $feedback->project_id;
        $feedback->delete();

        return redirect()
            ->to(route('project.show', $projectId) . '#feedback')
            ->with('success_feedback', 'Feedback dihapus.');
    }
}