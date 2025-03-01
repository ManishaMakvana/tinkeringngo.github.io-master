<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\User;
use App\Models\Program;

class ActivityController extends Controller {
    public function index() {
        $activities = Activity::with('program')->paginate(10); // Paginate results
        return view('manager.activities.index', compact('activities'));
    }

    public function create() {
        $trainers = User::where('role', 'trainer')->get();
        $programs = Program::all();
        return view('manager.activities.create', compact('trainers', 'programs'));
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'program_id' => 'required|exists:programs,id',
            'username' => 'required|exists:users,username',
            'activity_name' => 'required|string|max:255',
            'due_date' => 'required|date',
        ]);

        Activity::create($validatedData + ['status' => 'pending']);

        return redirect()->route('manager.activities.index')->with('success', 'Activity assigned successfully!');
    }
}
