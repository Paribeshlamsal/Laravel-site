<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    // Show the list of members
    public function index()
    {
        $members = Member::all(); // Get all members from the database
        return view('members.index', compact('members'));
    }

    // Show the form for creating a new member
    public function create()
    {
        return view('members.create');
    }

    // Store a newly created member in the database
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email',
            'phone' => 'required|string',
            'membership_type' => 'required|string',
        ]);

        // Create and save the new member
        Member::create($request->all());

        // Redirect back to the members list with success message
        return redirect()->route('members.index')->with('success', 'Member created successfully!');
    }

    // Show the form for editing a specific member
    public function edit($id)
    {
        $member = Member::findOrFail($id);  // Find the member by ID
        return view('members.edit', compact('member'));  // Return the edit view with the member's data
    }


    // Update the specified member in the database
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:members,email,' . $id,
            'phone' => 'required|string|max:15',
            'membership_type' => 'required|in:monthly,yearly',
        ]);

        $member = Member::findOrFail($id);
        $member->update($validated);  // Update the member with the validated data

        return redirect()->route('members.index')->with('success', 'Member updated successfully!');
    }


    // Remove the specified member from the database
    public function destroy(Member $member)
    {
        $member->delete();

        // Redirect back to the members list with success message
        return redirect()->route('members.index')->with('success', 'Member deleted successfully!');
    }
}