<?php

namespace App\Http\Controllers;

use App\Models\UserEducation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $userEducations = UserEducation::latest()->get();
        return view('user-education.index', get_defined_vars());
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
        $request->validate([
            'education_level' => 'required',
            'Institute'    => 'required',
            'obtain_marks' => 'required',
            'total_marks'  => 'required',
            'passing_date' => 'required',
            'degree_image' => 'max:500',
        ]);

        $input         = $request->all();
        $input['name'] = $request->get('name');

        UserEducation::create($input);
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
