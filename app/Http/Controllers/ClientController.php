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
        $clients = Client::get();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::get();
        return view('clients.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:clients,email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'company_name' => 'required|string',
            'gst_number' => 'required|string|max:15',
            'status' => 'required|in:active,inactive',
        ]);

        $clients = Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'company_name' => $request->company_name,
            'gst_number' => $request->gst_number,
            'status' => $request->status,
        ]);
        // dd($clients);

        return redirect()->route('clients.index')->with('success', 'Successfully Created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $client = Client::find($id);
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($id);
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:clients,email,' . $id,
            'phone' => 'required|string',
            'address' => 'required|string',
            'company_name' => 'required|string',
            'gst_number' => 'required|max:15',
            'status' => 'required|in:active,inactive',
        ]);
        $client = Client::find($id);

        $client->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'company_name' => $request->company_name,
            'gst_number' => $request->gst_number,
            'status' => $request->status,
        ]);
        // dd($client);

        return redirect()->route('clients.index')->with('success', 'Successfully Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::find($id);
        $client->delete();

        return redirect()->back()->with('success', 'Successfully Deleted.');
    }

}
