<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    //
    public function index(){
            $allclient= Client::orderBy('id','desc')->simplePaginate(10);
        return view("admin.client",compact(['allclient']));
    }
    public function store(Request $request){
        $validationRules = [
            'img'=> "required|image|mimes:jpeg,jpg,png,gif,webp,svg|max:2048",
        ] ;
        $request->validate($validationRules);
        try{
            $data = [] ;
            if ($request->hasFile('img')) {
                $path = $request->file('img')->store('client');
                $data['img'] = $path;
            }
            Client::create($data);
            return back()->with("success", "Successfully Client Created!");
            
        }catch (\Exception $e){
            Log::error("this message is from : ".__CLASS__."Line is : ".__LINE__." messages is ".$e->getMessage());
            return redirect()->route('error');
        }



    }
    public function destroy(int $id){
        try{
            $data = Client::findOrFail($id);
            //unlink image from directory....
            if($data->img && Storage::exists($data->img)){
                 Storage::delete($data->img);
            }
            $data->delete();
            return redirect()->route('admin.client')->with('success', 'Successfully Client Deleted!');

        }catch (\Exception $e){
            Log::error("this message is from : ".__CLASS__."Line is : ".__LINE__." messages is ".$e->getMessage());
            return redirect()->route('error');
        }

    }






}
