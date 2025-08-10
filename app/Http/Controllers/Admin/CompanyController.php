<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    //


    public function index()
    {
        $company = Company::all()->first();
        return view("admin.company", compact("company"));
    }

// |regex:/^01[3-9][0-9]{8}$/
    public function create(Request $request)
    {

        $validationRules = [
            'name' => 'required',
            'email' => 'required|email',
            'email2' => 'nullable|email',
            'phone' => 'required',
            'phone2' => 'nullable',
            'footer_text' => 'required|max:180',
            'facebook' => [
                'nullable',
                'url'
            ],
            'linkdin' => [
                'nullable',
                'url'
            ],
        ];
        if ($request->hasFile('logo')) {
            $validationRules['logo'] = [
                'required',
                'image',
                'mimes:jpeg,jpg,png,gif,webp,svg',
            ];
        }
        $request->validate($validationRules);
        $company = Company::first();

        $companyData = $request->only([
            'name',
            'email',
            'email2',
            'phone',
            'phone2',
            'footer_text',
            'notice1',
            'facebook',
            'notice2',
            'linkdin',
        ]);

        try {
            if ($company) {

                if ($request->hasFile('logo') && $company->logo != null) {
                    Storage::delete($company->logo);
                }

                if ($request->hasFile('logo')) {
                    $path = $request->file('logo')->store('company');
                    $companyData['logo'] = $path;
                }
                Company::where('id', '=', $company->id)->update($companyData);

            } else {
                if ($request->hasFile('logo')) {
                    $path = $request->file('logo')->store('company');
                    $companyData['logo'] = $path;
                }

                Company::create($companyData);
            }
            return back()->with('success', 'Successfully stored company detail');
        } catch (Exception $e) {
            Log::error("this message is from : " . __CLASS__ . "Line is : " . __LINE__ . " messages is " . $e->getMessage());
            return redirect()->route('error');
        }

    }



}
