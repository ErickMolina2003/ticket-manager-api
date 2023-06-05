<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $clients = Client::all();
        $array = [];
        foreach ($clients as $client) {
            $array[] = [
                'id' => $client->id,
                'first_name' => $client->first_name,
                'last_name' => $client->last_name,
                'username' => $client->username,
                'projects' => $client->projects,
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
        $client = new Client;
        $client->first_name = $request->first_name;
        $client->last_name = $request->last_name;
        $client->username = $request->username;
        $client->password = $request->password;
        $client->save();
        $data = [
            'message' => 'Client created succesfully',
            'client' => $client
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
        $data = [
            'message' => 'Client details',
            'client' => $client,
            'projects' => $client->projects
        ];
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
        $client->first_name = $request->first_name;
        $client->last_name = $request->last_name;
        $client->username = $request->username;
        $client->save();
        $data = [
            'message' => 'Client updated succesfully',
            'client' => $client
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
        $client->delete();
        $data = [
            'message' => 'Client deleted succesfully',
            'client' => $client
        ];
        return response()->json($data);
    }

    public function attach(Request $request) {
        $client = Client::find($request->client_id);
        $client->projects()->attach($request->project_id);
        $data = [
            'message' => 'Project attached successfully',
            'client' => $client
        ];
        return response()->json($data);
    }
}
