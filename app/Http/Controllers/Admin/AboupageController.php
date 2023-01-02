<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutFirst;
use App\Models\FirstMission;
use App\Models\SecondMission;
use App\Models\FirstExpert;
use App\Models\SecondExpert;
use App\Models\AboutTeam;


class AboupageController extends Controller
{
    //
    // About first section 

    public function aboutfirstcreate(){
        return view('admin.aboutfirstcreate');
    }
    public function aboutfirstinsert(Request $request){
        $request->validate([
            'img_name' => 'required'
        ]);
        $file = $request->file('img_name');
        $name_old = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $name = uniqid().''.time().'.'.$extension;
        $path = $file->move('public/homepage', $name);

        $Hometestis = new AboutFirst;

        $Hometestis->title = $request->heading;
        $Hometestis->content = $request->content;
        $Hometestis->content_2 = $request->content_2;
        $Hometestis->pic_name = $path;
        $Hometestis->save() ;
        return redirect('admin/aboutfirstall');
    }
    public function aboutfirstall(){
        $testis = AboutFirst::get();
        return view('admin.aboutfirstall', ['testis'=>$testis]);
    }
    public function aboutfirstdetail($id){
        $testis = AboutFirst::where('id', $id)->get();
        return view('admin.aboutfirstdetail', ['testis'=>$testis]);
    }
    public function aboutfirstupdate(Request $request){
        $Hometestis = AboutFirst::find($request->id);

        $file = $request->file('img_name');
        if(!empty($file)){
            $file = $request->file('img_name');
            $name_old = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = uniqid().''.time().'.'.$extension;
            $path = $file->move('public/homepage', $name);
        
            $Hometestis->title = $request->heading;
            $Hometestis->content = $request->content;
            $Hometestis->content_2 = $request->content_2;
            $Hometestis->pic_name = $path;
            $Hometestis->save() ;

        }
        else
        {
            $Hometestis->title = $request->heading;
            $Hometestis->content = $request->content;
            $Hometestis->content_2 = $request->content_2;
            $Hometestis->save() ;
        }
        return redirect('admin/aboutfirstall');   
    }

    public function aboutfirstdelete($id){
        $Hometestis = AboutFirst::find($id);
        if(!empty($Hometestis)){
            $Hometestis->delete();
            return redirect('admin/aboutfirstall');
        }else{
            return redirect('admin/aboutfirstall');
        }
    }

    






    // About Ouor mission first section 

    public function missionfirstcreate(){
        return view('admin.missionfirstcreate');
    }
    public function missionfirstinsert(Request $request){
        $request->validate([
            'img_name' => 'required'
        ]);
        $file = $request->file('img_name');
        $name_old = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $name = uniqid().''.time().'.'.$extension;
        $path = $file->move('public/homepage', $name);

        $Hometestis = new FirstMission;

        $Hometestis->title = $request->heading;
        $Hometestis->content = $request->content;
        // $Hometestis->content_2 = $request->content_2;
        $Hometestis->pic_name = $path;
        $Hometestis->save() ;
        return redirect('admin/missionfirstall');
    }
    public function missionfirstall(){
        $testis = FirstMission::get();
        return view('admin.missionfirstall', ['testis'=>$testis]);
    }
    public function missionfirstdetail($id){
        $testis = FirstMission::where('id', $id)->get();
        return view('admin.missionfirstdetail', ['testis'=>$testis]);
    }
    public function missionfirstupdate(Request $request){
        $Hometestis = FirstMission::find($request->id);

        $file = $request->file('img_name');
        if(!empty($file)){
            $file = $request->file('img_name');
            $name_old = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = uniqid().''.time().'.'.$extension;
            $path = $file->move('public/homepage', $name);
                    
            $Hometestis->title = $request->heading;
            $Hometestis->content = $request->content;
            // $Hometestis->content_2 = $request->content_2;
            $Hometestis->pic_name = $path;
            $Hometestis->save() ;

        }
        else
        {
            $Hometestis->title = $request->heading;
            $Hometestis->content = $request->content;
            // $Hometestis->content_2 = $request->content_2;
            $Hometestis->save() ;
        }
        return redirect('admin/missionfirstall');   
    }

    public function missionfirstdelete($id){
        $Hometestis = FirstMission::find($id);
        if(!empty($Hometestis)){
            $Hometestis->delete();
            return redirect('admin/missionfirstall');
        }else{
            return redirect('admin/missionfirstall');
        }
    }









    // About Ouor mission Second section 

    public function missionsecondcreate(){
        return view('admin.missionsecondcreate');
    }
    public function missionsecondinsert(Request $request){
        $request->validate([
            'img_name' => 'required'
        ]);
        $file = $request->file('img_name');
        $name_old = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $name = uniqid().''.time().'.'.$extension;
        $path = $file->move('public/homepage', $name);

        $Hometestis = new SecondMission;

        $Hometestis->title = $request->heading;
        $Hometestis->content = $request->content;
        $Hometestis->pic_name = $path;
        $Hometestis->save() ;
        return redirect('admin/missionsecondall');
    }
    public function missionsecondall(){
        $testis = SecondMission::get();
        return view('admin.missionsecondall', ['testis'=>$testis]);
    }
    public function missionseconddetail($id){
        $testis = SecondMission::where('id', $id)->get();
        return view('admin.missionseconddetail', ['testis'=>$testis]);
    }
    public function missionsecondupdate(Request $request){
        $Hometestis = SecondMission::find($request->id);

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
        return redirect('admin/missionseconddetail');   
    }

    public function missionseconddelete($id){
        $Hometestis = SecondMission::find($id);
        if(!empty($Hometestis)){
            $Hometestis->delete();
            return redirect('admin/missionsecondall');
        }else{
            return redirect('admin/missionsecondall');
        }
    }










    // About Ouor Expert first section 

    public function expertfirstcreate(){
        return view('admin.expertfirstcreate');
    }
    public function expertfirstinsert(Request $request){
        $request->validate([
            'img_name' => 'required'
        ]);
        $file = $request->file('img_name');
        $name_old = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $name = uniqid().''.time().'.'.$extension;
        $path = $file->move('public/homepage', $name);

        $Hometestis = new FirstExpert;

        $Hometestis->title = $request->heading;
        $Hometestis->content = $request->content;
        $Hometestis->content_2 = $request->content_2;
        $Hometestis->pic_name = $path;
        $Hometestis->save() ;
        return redirect('admin/expertfirstall');
    }
    public function expertfirstall(){
        $testis = FirstExpert::get();
        return view('admin.expertfirstall', ['testis'=>$testis]);
    }
    public function expertfirstdetail($id){
        $testis = FirstExpert::where('id', $id)->get();
        return view('admin.expertfirstdetail', ['testis'=>$testis]);
    }
    public function expertfirstupdate(Request $request){
        $Hometestis = FirstExpert::find($request->id);

        $file = $request->file('img_name');
        if(!empty($file)){
            $file = $request->file('img_name');
            $name_old = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = uniqid().''.time().'.'.$extension;
            $path = $file->move('public/homepage', $name);
        
            $Hometestis->title = $request->heading;
            $Hometestis->content = $request->content;
            $Hometestis->content_2 = $request->content_2;
            $Hometestis->pic_name = $path;
            $Hometestis->save() ;

        }
        else
        {
            $Hometestis->title = $request->heading;
            $Hometestis->content = $request->content;
            $Hometestis->content_2 = $request->content_2;
            $Hometestis->save() ;
        }
        return redirect('admin/expertfirstall');   
    }

    public function expertfirstdelete($id){
        $Hometestis = FirstExpert::find($id);
        if(!empty($Hometestis)){
            $Hometestis->delete();
            return redirect('admin/expertfirstall');
        }else{
            return redirect('admin/expertfirstall');
        }
    }










    // About Ouor expert Second section 

    public function expertsecondcreate(){
        return view('admin.expertsecondcreate');
    }
    public function expertsecondinsert(Request $request){
        $request->validate([
            'img_name' => 'required'
        ]);
        $file = $request->file('img_name');
        $name_old = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $name = uniqid().''.time().'.'.$extension;
        $path = $file->move('public/homepage', $name);
        

        $Hometestis = new SecondExpert;

        $Hometestis->title = $request->heading;
        $Hometestis->content = $request->content;
        $Hometestis->pic_name = $path;
        $Hometestis->save() ;
        return redirect('admin/expertsecondall');
    }
    public function expertsecondall(){
        $testis = SecondExpert::get();
        return view('admin.expertsecondall', ['testis'=>$testis]);
    }
    public function expertseconddetail($id){
        $testis = SecondExpert::where('id', $id)->get();
        return view('admin.expertseconddetail', ['testis'=>$testis]);
    }
    public function expertsecondupdate(Request $request){
        $Hometestis = SecondExpert::find($request->id);

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
        return redirect('admin/expertseconddetail');   
    }

    public function expertseconddelete($id){
        $Hometestis = SecondExpert::find($id);
        if(!empty($Hometestis)){
            $Hometestis->delete();
            return redirect('admin/expertsecondall');
        }else{
            return redirect('admin/expertsecondall');
        }
    }







    public function aboutteamcreate(){
        return view('admin.about.aboutteamcreate');
    }
    public function aboutteaminsert(Request $request){
        $request->validate([
            'img_name' => 'required'
        ]);

        $file = $request->file('img_name');
        $name_old = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $name = uniqid().''.time().'.'.$extension;
        $path = $file->move('/public/aboutpage', $name);

        $Hometestis = new AboutTeam;

        $Hometestis->heading = $request->heading;
        $Hometestis->sub_heading = $request->sub_heading;
        $Hometestis->pic_path = $path;
        $Hometestis->save() ;
        return redirect('admin/aboutteamall');
    }
    public function aboutteamall(){
        $testis = AboutTeam::get();
        return view('admin.about.aboutteamall', ['testis'=>$testis]);
    }
    public function aboutteamdetail($id){
        $testis = AboutTeam::where('id', $id)->get();
        return view('admin.about.aboutteamdetail', ['testis'=>$testis]);
    }
    public function aboutteamupdate(Request $request){
        $Hometestis = AboutTeam::find($request->id);

        $file = $request->file('img_name');
        if(!empty($file)){
            $file = $request->file('img_name');
            $name_old = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = uniqid().''.time().'.'.$extension;
            $path = $file->move('public/aboutpage', $name);
        
            $Hometestis->heading = $request->heading;
            $Hometestis->sub_heading = $request->sub_heading;
            $Hometestis->pic_path = $path;
            $Hometestis->save();

        }
        else
        {
            $Hometestis->heading = $request->heading;
            $Hometestis->sub_heading = $request->sub_heading;
            $Hometestis->save() ;
        }
        return redirect('admin/aboutteamall');   
    }

    public function aboutteamdelete($id){
        $Hometestis = AboutTeam::find($id);
        if(!empty($Hometestis)){
            $Hometestis->delete();
            return redirect('admin/aboutteamall');
        }else{
            return redirect('admin/aboutteamall');
        }
    }

    












}
