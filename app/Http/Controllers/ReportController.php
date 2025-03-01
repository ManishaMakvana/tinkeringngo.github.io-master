<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\User;

class ReportController extends Controller
{
   
    public function create(Request $request)
{
    // Retrieve values from query parameters
    $program_id = $request->input('program_id', '');
    $username = $request->input('username', '');

    // Fetch only the programs related to the selected program_id
    $programs = Program::where('programid', $program_id)->select('programid', 'title')->get();

    return view('reports.create', [
        'program_id' => $program_id,
        'username' => $username,
        'programs' => $programs
    ]);
}


    

}
