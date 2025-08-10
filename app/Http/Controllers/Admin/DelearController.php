<?php

namespace App\Http\Controllers\Admin;
use Exception;
use App\Models\Area;
use App\Models\Dealer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class DelearController extends Controller
{
    //
    public function index(?int $id=null){
        $editItem = null;
        if($id != null){
            $editItem = Dealer::findOrFail($id);
        }
        $areas = Area::all();
        $search = request()->query("search",null);
        if($search){
            $alldelears = Dealer::with('area')->where('status','=','a')->where('name','like','%'.$search.'%')->orderBy("id","desc")->paginate(10);
        }else{
             $alldelears = Dealer::with('area')->where('status','=','a')->orderBy("id","desc")->paginate(10);
        }
        return view("admin.delear",compact("alldelears","editItem",'areas'));
    }
    public function pendingDealers(){
        $search = request()->query("search",null);
        if($search){
            $alldelears = Dealer::with('area')->where('status','=','p')->where('name','like','%'.$search.'%')->orderBy("id","desc")->paginate(10);
        }else{
             $alldelears = Dealer::with('area')->where('status','=','p')->orderBy("id","desc")->paginate(10);
        }
        return view("admin.panding",compact("alldelears"));
    }

    public function updatePending(int $id){

        try{
            // return response()->json(['id' => $id],200);
            Dealer::findOrFail($id)->update(["status"=> "a"]);
            return redirect()->back()->with('success',"successfully Dealer Approved!");
        }catch (Exception $e){
            return redirect()->back()->with('danger',"There is some problem");
        }
    }

    public function store(Request $request,?int $id=null){
        $request->validate([
            "name"=> "required",
            'phone' => ['required', 'regex:/^01[3-9][0-9]{8}$/'],
            'address' => 'required',
            'email' => ['required','email'],
            'phone2'=> ['nullable', 'regex:/^01[3-9][0-9]{8}$/'],
            'company_name'=> ['required'],
        ]);
        $data = $request->only(['name','phone','address','area_id','phone2','company_name','email','status','website']);
        try{
            if($id != null){
                Dealer::where('id',$id)->update($data);

                 if ($request->route()->named('admin.delear')) {
                      return redirect()->route('admin.delear',['page'=>$request->query('page'),'search'=>$request->query('search')])->with('  success','Successfully Dealer Edited!');
                }else{
                    return redirect()->route('admin.p_delear',['page'=>$request->query('page'),'search'=>$request->query('search')])->with('  success','Successfully Dealer Edited!');
                }
            }
            Dealer::create($data);
            return redirect()->back()->with('success','Successfully Dealer Created!');

        }catch(Exception $e){
            Log::error("this message is from : ".__CLASS__."Line is : ".__LINE__." messages is ".$e->getMessage());
            return redirect()->route('error');
        }
    }
    public function destroy(int $id){
        try{
            Dealer::findOrFail($id)->delete();
            return redirect()->back()->with("success","Successfully Dealer Deleted!");
        }catch(Exception $e){
            Log::error("this message is from : ".__CLASS__."Line is : ".__LINE__." messages is ".$e->getMessage());
            return redirect()->route('error');
        }
    }

}
