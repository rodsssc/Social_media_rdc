<?php

namespace App\Http\Controllers;

use App\Models\React;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Debug: Log request data
        \Log::info('Reaction Data Received:', $request->all());
    
        // Validate input
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'action' => 'required|string'
        ]);
    
        // Save the reaction to the database
        $react = new React();
        $react->user_id = auth()->id(); // Get the logged-in user ID
        $react->post_id = $request->post_id;
        $react->action = $request->action;
        $react->save();
    
        return redirect()->back()->with('success', 'Reaction saved!');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
