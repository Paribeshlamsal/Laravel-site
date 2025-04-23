<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    // Display a list of trainers
    public function index()
    {
        $trainers = Trainer::all();  // Fetch all trainers
        return view('trainers.index', compact('trainers'));
    }

    // Show the form to create a new trainer
    public function create()
    {
        return view('trainers.create');
    }

    // Store a new trainer in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:trainers,email',
            'bio' => 'nullable|string',
        ]);

        Trainer::create($request->all());

        return redirect()->route('trainers.index')->with('success', 'Trainer created successfully.');
    }

    // Show the form to edit a trainer
    public function edit($id)
    {
        $trainer = Trainer::findOrFail($id);
        return view('trainers.edit', compact('trainer'));
    }

    // Update the trainer's details
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:trainers,email,' . $id,
            'bio' => 'nullable|string',
        ]);

        $trainer = Trainer::findOrFail($id);
        $trainer->update($request->all());

        return redirect()->route('trainers.index')->with('success', 'Trainer updated successfully.');
    }

    // Delete a trainer
    public function destroy($id)
    {
        $trainer = Trainer::findOrFail($id);
        $trainer->delete();

        return redirect()->route('trainers.index')->with('success', 'Trainer deleted successfully.');
    }
}
