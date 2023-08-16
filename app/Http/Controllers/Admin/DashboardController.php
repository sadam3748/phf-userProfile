<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Auction as AuctionResource;
use App\Models\Auction;
use App\Models\AuctionVehicle;
use App\Models\Bid;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        return view('admin.pages.dashboard');
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function profile(){
        $profile = Auth::user();
        return view('admin.pages.admin-profile',get_defined_vars());
    }

    /**
     * @param Request $request
     * @param User $profile
     * @return RedirectResponse
     */
    public function storeProfile(Request $request,User $profile){
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|min:2|max:60',
            'email'    => 'required|string|email|min:10|max:60|unique:users,email,'. $profile->id,
            'phone_no' => 'required|min:11|max:11|regex:/^((0)?)(0)(3)([0-9]{9})/',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $input             = $request->all();
        $input['name']     = $request->get('name') ? $request->get('name') : $profile->name;
        $input['password'] = $request->get('password') ? Hash::make($request->get('password')) : $profile->password;
        $input['role_id']  = 2;
        $profile->update($input);
        return redirect()->back()->with('success','Profile updated successfully.');
    }
}
