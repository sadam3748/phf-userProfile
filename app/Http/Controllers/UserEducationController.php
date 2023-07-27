<?php

namespace App\Http\Controllers;

use App\Models\UserEducation;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserEducationController extends Controller
{
    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
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
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'education_level' => 'required',
            'institute'    => 'required',
            'obtain_marks' => 'required',
            'total_marks'  => 'required',
            'passing_date' => 'required',
            'degree_image' => 'required|max:500',
        ]);

        $input = $request->all();
        $input['user_id'] = Auth::id();

        if ($request->hasFile('degree_image'))
        {
            $profile_data = UPLOAD_FILE($request->degree_image, 'frontend/user/degree_image');
            $input['degree_image'] = $profile_data;
        }

        UserEducation::create($input);
        return response()->json('Education created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * @param string $id
     * @return JsonResponse
     */
    public function edit(string $id)
    {
        $education = UserEducation::where('id',$id)->first();
        return response()->json([
            'success' => true,
            'education' => $education,
            'update_form_action' => route('user-educations.update',$education->id),
        ]);
    }

    /**
     * @param Request $request
     * @param string $id
     * @return JsonResponse
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'education_level' => 'required',
            'institute'    => 'required',
            'obtain_marks' => 'required',
            'total_marks'  => 'required',
            'passing_date' => 'required',
            'degree_image' => 'max:500',
        ]);

        $education = UserEducation::where('id',$id)->first();

        $input = $request->all();
        $input['user_id'] = Auth::id();

        if ($request->hasFile('degree_image'))
        {
            $profile_data = UPLOAD_FILE($request->degree_image, 'frontend/user/degree_image');
            $input['degree_image'] = $profile_data;
        }else
        {
            $input['degree_image'] = $education->degree_image;
        }

        $education->update($input);
        return response()->json('Education updated successfully!');
    }

    /**
     * @param string $id
     * @return RedirectResponse
     */
    public function destroy(string $id)
    {
        $education = UserEducation::find($id);

        if(!empty($education->degree_image))
            Storage::delete($education->degree_image);

        $education->forceDelete();
        return redirect()->back()->with('success','Education deleted successfully');
    }
}
