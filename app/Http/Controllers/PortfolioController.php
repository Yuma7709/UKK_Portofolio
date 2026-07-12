<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Message;

class PortfolioController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $messages = Message::all();

        return view('portfolio', compact('projects', 'messages'));
    }
}