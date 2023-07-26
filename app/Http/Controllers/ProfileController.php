<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
//    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
//        $request->user()->fill($request->validated());
        $request->validate([
            'name'                  => ['required', 'string'],
            'email'                 => 'required', 'string', 'email', 'max:255', 'unique:'.Auth::id(),
            'phone_no'              =>  'required|min:11|max:11|regex:/^((0)?)(0)(3)([0-9]{9})/',
            'pnc_no'                => ['required'],
            'father_name'           => ['required'],
            'date_of_birth'         => ['required'],
            'domicile'              => ['required'],
            'gender'                => ['required'],
            'cnic'                  => ['required'],
            'cnic_expiry'           => ['required'],
            'marital_status'        => ['required'],
            'city_of_residence'     => ['required'],
            'address'               => ['required'],
            'profile_image'         => 'max:500',
            'cnic_front_image'      => 'max:500',
            'cnic_back_image'       => 'max:500',
            'pnc_certificate_image' => 'max:500',
        ]);

//        if ($request->user()->isDirty('email')) {
//            $request->user()->email_verified_at = null;
//        }

        User::where('id',Auth::id())->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone_no' => $request->phone_no,
            'pnc_no'   => $request->pnc_no,
        ]);

        $user = Auth::user();
        $userProfile = $this->_filterProfileRequest($request);

        if ($request->hasFile('profile_image')) {
            $profile_data = UPLOAD_FILE($request->profile_image, 'frontend/user/customer_images');
            $userProfile['profile_image'] = $profile_data;
        }

        if ($request->hasFile('domicile_image')) {
            $domicile_data = UPLOAD_FILE($request->domicile_image, 'frontend/user/customer_images');
            $userProfile['domicile_image'] = $domicile_data;
        }

        if ($request->hasFile('cnic_front_image')) {
            $cnic_front_data = UPLOAD_FILE($request->cnic_front_image, 'frontend/user/customer_images');
            $userProfile['cnic_front_image'] = $cnic_front_data;
        }

        if ($request->hasFile('cnic_back_image')) {
            $cnic_back_data = UPLOAD_FILE($request->cnic_back_image, 'frontend/user/customer_images');
            $userProfile['cnic_back_image'] = $cnic_back_data;
        }

        if ($request->hasFile('pnc_certificate_image')) {
            $pnc_certificate_data = UPLOAD_FILE($request->pnc_certificate_image, 'frontend/user/customer_images');
            $userProfile['pnc_certificate_image'] = $pnc_certificate_data;
        }


        UserProfile::updateorCreate([
            'user_id'   => Auth::id(),
        ],$userProfile);

        return Redirect::route('user-educations.index')->with('status', 'profile-updated');
//        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * @param $request
     * @return array
     */
    private function _filterProfileRequest($request):array
    {
        return [
            'user_id'     =>  Auth::id(),
            'father_name' =>  $request->father_name,
            'gender'      =>  $request->gender,
            'date_of_birth' =>  $request->date_of_birth,
            'cnic' =>  $request->cnic,
            'cnic_expiry' =>  $request->cnic_expiry,
            'marital_status' =>  $request->marital_status,
            'domicile' =>  $request->domicile,
            'city_of_residence' =>  $request->city_of_residence,
            'address' =>  $request->address,
        ];
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
