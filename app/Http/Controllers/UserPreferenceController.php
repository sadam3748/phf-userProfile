<?php

namespace App\Http\Controllers;
use App\Models\NursingCollege;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Preference;
use Illuminate\Http\RedirectResponse;

class UserPreferenceController extends Controller
{
    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function data_get()
    {
        $user = Auth::user();
        $nursingColleges = NursingCollege::get();
        $userPrefences = Preference::where('user_id', Auth::id())->latest()->get();
        return view('preference.index', get_defined_vars());
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'nursing_colleges' => 'required',
        ]);

        # check nursing already exists
        $exists = Preference::where(['user_id' => Auth::id(), 'nursing_college_id' => $request->nursing_colleges])->first();
        if(!empty($exists))
            return response()->json(['error' => 'Nursing College already exists!']);

        $input = $request->all();
        $input['user_id'] = Auth::id();
        $input['nursing_college_id'] = $request->nursing_colleges;

        Preference::create($input);

        return response()->json('Nursing College created successfully!');

    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function updateOrder(Request $request)
    {
        $order = $request->input('order');

        // Loop through the order array and update the database records accordingly
        foreach ($order as $position => $itemId) {
            Preference::where('id', $itemId)->where('user_id', Auth::id())->update(['order' => $position + 1]);
        }

        return response()->json('Order updated successfully');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $data = Preference::find($id);

        if ($data) {
            $data->forceDelete();
        }

        return redirect()->route('preference.get')->with('success','Nursing College deleted successfully');

    }
}
