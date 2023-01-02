<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CaseFirst;

class CasestudyController extends Controller
{
    // Case Study First section 

    public function casefirstcreate(){
        return view('admin.casestudy.casefirstcreate');
    }
    public function casefirstinsert(Request $request){
        $request->validate([
            'img_name' => 'required'
        ]);
        $file = $request->file('img_name');
        $name_old = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $name = uniqid().''.time().'.'.$extension;
        $path = $file->move('public/homepage', $name);

        $Hometestis = new CaseFirst;

        $Hometestis->title = $request->heading;
        $Hometestis->content = $request->content;
        $Hometestis->pic_name = $path;
        $Hometestis->save() ;
        return redirect('admin/casefirstall');
    }
    public function casefirstall(){
        $testis = CaseFirst::get();
        return view('admin.casestudy.casefirstall', ['testis'=>$testis]);
    }
    public function casefirstdetail($id){
        $testis = CaseFirst::where('id', $id)->get();
        return view('admin.casestudy.casefirstdetail', ['testis'=>$testis]);
    }
    public function casefirstupdate(Request $request){
        $Hometestis = CaseFirst::find($request->id);

        $file = $request->file('img_name');
        if(!empty($file)){
            $file = $request->file('img_name');
            $name_old = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = uniqid().''.time().'.'.$extension;
            $path = $file->move('public/homepage', $name);
        
            $Hometestis->title = $request->heading;
            $Hometestis->content = $request->content;
            $Hometestis->pic_name = $path;
            $Hometestis->save() ;

        }
        else
        {
            $Hometestis->title = $request->heading;
            $Hometestis->content = $request->content;
            $Hometestis->save() ;
        }
        return redirect('admin/casefirstall');   
    }

    public function casefirstdelete($id){
        $Hometestis = CaseFirst::find($id);
        if(!empty($Hometestis)){
            $Hometestis->delete();
            return redirect('admin/casefirstall');
        }else{
            return redirect('admin/casefirstall');
        }
    }





}
