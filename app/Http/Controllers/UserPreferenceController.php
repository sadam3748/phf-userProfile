<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Preference;

class UserPreferenceController extends Controller
{
    public function data_get()
    {
        $user = Auth::user();
        $userPrefences = Preference::latest()->get();
        return view('preference.index', get_defined_vars());
    }
    public function store(Request $request)
    {
        $request->validate([
            'nursing_colleges' => 'required',
        ]);
        $preference = new Preference();
        $preference->nursing_colleges= $request->nursing_colleges;
        $preference->user_id = Auth::user()->id;
        $preference->save();

        $userPrefences = Preference::latest()->get();
        return redirect()->route('preference');
        //  return view('preference.index', get_defined_vars());

        // return view('preference.index', get_defined_vars());
    //    dd(preference);
        // Preference::create($input);


        // $model = new YourModel();
        // $model->column1 = $request->input('column1');
        // $model->column2 = $request->input('column2');
        // // Set other properties based on your table's columns

        // // Save the data to the database
        // $model->save();
    }
}
