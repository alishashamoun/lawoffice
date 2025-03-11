<?php

namespace App\Http\Controllers;

use App\Models\Attorney;
use App\Models\Client;
use App\Models\ClientCase;
use Illuminate\Http\Request;

class CaseController extends Controller
{
    public function index()
    {
        $clientcases = ClientCase::with('client', 'attorney')->get();
        return view('clientcase.index', compact('clientcases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientcases = ClientCase::get();
        $clients = Client::select('id', 'name')->get();
        $attorneys = Attorney::select('id', 'name')->get();
        return view('clientcase.create', compact('clientcases', 'clients', 'attorneys'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'attorney_id' => 'required|exists:attorneys,id',
            'court_date' => 'required',
            'case_details' => 'required|string',

        ]);

        $clientcases = ClientCase::create([
            'client_id' => $request->client_id,
            'attorney_id' => $request->attorney_id,
            'court_date' => $request->court_date,
            'case_details' => $request->case_details,

        ]);
        // dd($clientcases);

        return redirect()->route('cases.index')->with('success', 'Successfully Created.');
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
      $clientcase = ClientCase::find($id);
      $clients = Client::select('id', 'name')->get();
      $attorneys = Attorney::select('id', 'name')->get();
        return view('clientcase.edit', compact('clientcase', 'clients', 'attorneys'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'attorney_id' => 'required|exists:attorneys,id',
            'court_date' => 'required',
            'case_details' => 'required|string',

        ]);
        $clientcase = ClientCase::find($id);

        $clientcase->update([
            'client_id' => $request->client_id,
            'attorney_id' => $request->attorney_id,
            'court_date' => $request->court_date,
            'case_details' => $request->case_details,

        ]);
        // dd($client);

        return redirect()->route('cases.index')->with('success', 'Successfully Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $clientcase = ClientCase::find($id);
      $clientcase->delete();

        return redirect()->back()->with('success', 'Successfully Deleted.');
    }
}
