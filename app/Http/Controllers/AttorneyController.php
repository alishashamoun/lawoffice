<?php

namespace App\Http\Controllers;

use App\Models\Attorney;
use Illuminate\Http\Request;

class AttorneyController extends Controller
{
    public function index()
    {
        $attorneys = Attorney::get();
        return view('attorney.index', compact('attorneys'));
    }


   public function create()
   {
    $attorneys = Attorney::get();
       return view('attorney.create', compact('attorneys'));
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
       $request->validate([
           'name' => 'required|string',
           'email' => 'required|email|unique:attorneys,email',
           'phone' => 'required|string',
           'address' => 'required|string',
           'status' => 'required|in:active,inactive',
       ]);

       $attorneys = Attorney::create([
           'name' => $request->name,
           'email' => $request->email,
           'phone' => $request->phone,
           'address' => $request->address,
           'status' => $request->status,
       ]);
       // dd($attorneys);

       return redirect()->route('attorneys.index')->with('success', 'Successfully Created.');
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
       $attorney = Attorney::find($id);
       return view('attorney.edit', compact('attorney'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, $id)
   {
       // dd($id);
       $request->validate([
           'name' => 'required|string',
           'email' => 'required|email|unique:attorneys,email,' . $id,
           'phone' => 'required|string',
           'address' => 'required|string',
           'status' => 'required|in:active,inactive',
       ]);
       $attorney = Attorney::find($id);

       $attorney->update([
           'name' => $request->name,
           'email' => $request->email,
           'phone' => $request->phone,
           'address' => $request->address,
           'status' => $request->status,
       ]);
       // dd($attorney);

       return redirect()->route('attorneys.index')->with('success', 'Successfully Updated.');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(string $id)
   {
       $client = Attorney::find($id);
       $client->delete();

       return redirect()->back()->with('success', 'Successfully Deleted.');
   }
}
