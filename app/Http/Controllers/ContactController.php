<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Faq;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //

    public function index(){

        $faqs = Faq::all();
        $company = Contact::first();
        return view('user.contact',compact(['faqs','company']));
    }
}
