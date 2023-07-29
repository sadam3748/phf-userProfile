<?php

namespace App\Http\Controllers;

use App\Models\UserExperience;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserExperienceController extends Controller
{
    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $user = Auth::user();
        $userExperiences = UserExperience::where('user_id', Auth::id())->latest()->get();
        return view('user-experience.index', get_defined_vars());
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
            'organization_type' => 'required',
            'organization_name' => 'required',
            'position_title'    => 'required',
            'from_date'         => 'required|date|before_or_equal:to_date',
            'to_date'           => 'required|date|after_or_equal:from_date',
            'certificate_image' => 'required|max:500',
            'noc_image'         => 'required|max:500',
        ]);

        $input = $request->all();
        $input['user_id'] = Auth::id();

        if ($request->hasFile('certificate_image'))
        {
            $certificate_data = UPLOAD_FILE($request->certificate_image, 'frontend/user/user_experience_image');
            $input['certificate_image'] = $certificate_data;
        }

        if ($request->hasFile('noc_image'))
        {
            $noc_data = UPLOAD_FILE($request->noc_image, 'frontend/user/user_experience_image');
            $input['noc_image'] = $noc_data;
        }

        UserExperience::create($input);
        return response()->json('Experience created successfully!');
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
        $experience = UserExperience::where('id',$id)->first();
        return response()->json([
            'success' => true,
            'experience' => $experience,
            'update_form_action' => route('user-experiences.update',$experience->id),
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
            'organization_type' => 'required',
            'organization_name' => 'required',
            'position_title'    => 'required',
            'from_date'         => 'required|date|before_or_equal:to_date',
            'to_date'           => 'required|date|after_or_equal:from_date',
            'certificate_image' => 'max:500',
            'noc_image'         => 'max:500',
        ]);

        $experience = UserExperience::where('id',$id)->first();

        $input = $request->all();
        $input['user_id'] = Auth::id();

        if ($request->hasFile('certificate_image'))
        {
            $certificate_data = UPLOAD_FILE($request->certificate_image, 'frontend/user/user_experience_image');
            $input['certificate_image'] = $certificate_data;
        }else {
            $input['certificate_image'] = $experience->certificate_image;
        }

        if ($request->hasFile('noc_image'))
        {
            $noc_data = UPLOAD_FILE($request->noc_image, 'frontend/user/user_experience_image');
            $input['noc_image'] = $noc_data;
        }else{
            $input['noc_image'] = $experience->noc_image;
        }

        $experience->update($input);
        return response()->json('Experience updated successfully!');
    }

    /**
     * @param string $id
     * @return RedirectResponse
     */
    public function destroy(string $id)
    {
        $experience = UserExperience::find($id);

        if(!empty($experience->certificate_image))
            Storage::delete($experience->certificate_image);

        if(!empty($experience->noc_image))
            Storage::delete($experience->noc_image);

        $experience->forceDelete();
        return redirect()->back()->with('success','Experience deleted successfully');
    }
}
