<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use Illuminate\Support\Facades\Auth;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        return view('admin.modules', compact('programs'));
    }


    public function showProgramDashboard()
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login')->with('error', 'Please log in to access the dashboard.');
    }

    $programs = Program::where('programid', $user->programid)->get();

    return view('program', [
        'programs' => $programs,
        'program_id' => $user->programid,
        'username' => $user->username, // Pass username to the view
    ]);
}

    



//add module
    public function create()
    {
        return view('admin.addModule');
    }

    public function store(Request $request)
    {
        $request->validate([
            'programid' => 'required|string|max:255',
            'module_id' => 'required|string|max:255',
            'std' => 'required|string|max:255',
            'document_type' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'publish_link' => 'nullable|url',
            'presentation_link' => 'nullable|url',
            'youtube_voiceover' => 'nullable|url',
            'google_slide' => 'nullable|url',
            'worksheet' => 'nullable|url',
        ]);

        Program::create($request->all());
        return redirect()->route('admin.modules')->with('success', 'Module added successfully!');
    }

    


    // search
   
    public function modulesindex(Request $request)
{
    $query = Program::query();

    // Search filter
    if ($request->has('search')) {
        $searchTerm = $request->search;
        $query->where('title', 'LIKE', '%' . $searchTerm . '%')
              ->orWhere('programid', 'LIKE', '%' . $searchTerm . '%');
    }

    // Ordering filter
    if ($request->has('order_by') && in_array($request->order_by, ['id', 'programid', 'module_id', 'std', 'document_type', 'title'])) {
        $query->orderBy($request->order_by, 'asc');
    }

    // Number of records per page (default is 10)
    $perPage = $request->get('per_page', 10);

    // Pagination - show specified number of records per page
    $programs = $query->paginate($perPage);

    return view('admin.modules', compact('programs'));
}


public function edit($id)
{
    $program = Program::findOrFail($id);
    return view('admin.editModule', compact('program'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'programid' => 'required|string|max:255',
        'module_id' => 'required|string|max:255',
        'std' => 'required|string|max:255',
        'document_type' => 'required|string|max:255',
        'title' => 'required|string|max:255',
        'publish_link' => 'nullable|url',
        'presentation_link' => 'nullable|url',
        'youtube_voiceover' => 'nullable|url',
        'google_slide' => 'nullable|url',
        'worksheet' => 'nullable|url',
    ]);

    $program = Program::findOrFail($id);
    $program->update($request->all());

    return redirect()->route('admin.modules.index')->with('success', 'Module updated successfully!');
}


    

}
