<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $projects = Project::all();
        $array = [];
        foreach($projects as $project) {
            $array[] = [
                'id' => $project->id,
                'name' => $project->name,
                'name_code' => $project->name_code,
                'description' => $project->description,
                'clients' => $project->clients,
                'tickets' => $project->tickets,
            ];
        }
        return response()->json($array);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $project = new Project;
        $project->name = $request->name;
        $project->name_code = $request->name_code;
        $project->description = $request->description;
        $project->save();
        $data = [
            'message' => 'Project created succesfully',
            'project' => $project
        ];
        return response()->json($data);

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
        $data = [
            'message' => 'Projects details',
            'project' => $project,
            'clients' => $project->clients,
            'tickets' => $project->tickets,
        ];
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
        $project->name_code = $request->name_code;
        $project->description = $request->description;
        $project->save();
        $data = [
            'message' => 'Project updated succesfully',
            'project' => $project
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
        $project->delete();
        $data = [
            'message' => 'Project deleted succesfully',
            'project' => $project
        ];
        return response()->json($data);
    }
}
