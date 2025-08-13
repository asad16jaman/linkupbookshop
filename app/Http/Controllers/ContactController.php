<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    //

    public function index(){

        $faqs = Faq::all();
        $company = Contact::first();
        return view('user.contact',compact(['faqs','company']));
    }

    public function storeContact(Request $request){

        $request->validate([
            'name' => 'required|min:3',
            'email'=> 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
        
        try{
            $data = $request->only(['name','subject','email','message']);
            Contact::create($data);
            return back()->with('success',"Message Successfully sand...");
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return back()->with('danger',"There is some Problem It will fixed soon");
        }
    }
}
