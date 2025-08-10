<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feedback;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FeedbackController extends Controller
{
    //


    public function index(Request $request, ?int $id = null)
    {
        $editfeedback = null;
        if ($id != null) {
            $editfeedback = Feedback::findOrFail($id);
        }
        $allusers = User::where('type','=','user')->get();
        $search = $request->input('search', null);
        if ($search) {
            $allfeedback = Feedback::with('user')->where('note', 'like', '%' . $search . '%')->orderBy('id', 'desc')->get();
        } else {
            $allfeedback = Feedback::with('user')->orderBy('id', 'desc')->get();
        }
        // return response()->json($allfeedback);
        return view("admin.feedback", compact("editfeedback", "allfeedback",'allusers'));
    }

    public function store(Request $request, ?int $id = null)
    {
        $validaterules = [
            "user_id" => "required",
            'note' => 'required'

        ];
        $request->validate($validaterules);
        $data = $request->only(['user_id','note']);

        if ($id != null) {
            // $currentEditUser = Feedback::findOrFail($id);
            Feedback::where('id', '=', $id)->update($data);
            return redirect()->route('admin.feedback', ['page' => $request->query('page'), 'search' => $request->query('search')])->with('success', "Successfully updated Feedback");
        }

        Feedback::create($data);
        return back()->with("success", "Successfully created Feedback");
    }

    public function destroy(int $id)
    {

        $slider = Feedback::findOrFail($id);
        $slider->delete();
        return redirect()->route('admin.feedback')->with('success', 'Successfully Deleted Feedback');

    }

}
