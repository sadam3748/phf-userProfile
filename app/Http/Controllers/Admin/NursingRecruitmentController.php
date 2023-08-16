<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class NursingRecruitmentController extends Controller
{
    Const  ROLE_ID = 1;

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $nursingRecruitments = User::where('role_id', self::ROLE_ID)->latest()->get();
        return view('admin.pages.nursing-recruitments.nursing-recruitment',get_defined_vars());
    }

    /**
     * @param $id
     * @return Application|Factory|View|\Illuminate\Foundation\Application|never
     */
    public function show($id)
    {
        try {
            $nursingRecruitment = User::with('userProfile')->where('id', decrypt($id))->first();
            return view('admin.pages.nursing-recruitments.nursing-recruitment-view', get_defined_vars());
        }catch (DecryptException $exception)
        {
            return abort(404,'Not Found');
        }
    }
}
