<?php
// https://github.com/vmokshaproducts/vmoksha-website.git
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Homebanner;
use App\Models\Homeservices;
use App\Models\HomeWhy;
use App\Models\Testimonial;
use App\Models\ClientLogo;

class HomepageController extends Controller
{
    //
    public function createhomebanner(){
        return view('admin.createhomebanner');
    }

    public function inserthomebanner(Request $request){
        $request->validate([
            'banner_right_image' => 'required'
        ]);
        $file = $request->file('banner_right_image');
        $name_old = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $name = uniqid().''.time().'.'.$extension;
        $path = $file->move('public/Homepage', $name);

        $Homebanner = new Homebanner;

        $Homebanner->heading_one = $request->heading1;
        $Homebanner->heading_two = $request->heading2;
        $Homebanner->sub_heading = $request->sub_heading;
        $Homebanner->banner_right_img = $path;
        $Homebanner->save() ;
        return redirect('admin/homebanner');
    }

    public function homebanner(){
        $banner = Homebanner::get();
        return view('admin.homebanner', ['banner'=>$banner]);
    }

    public function homebannerupdate(Request $request){
        $request->validate([
            'banner_right_image' => 'required'
        ]);
        $Homebanner = Homebanner::find($request->id);

        $file = $request->file('banner_right_image');
        if(!empty($file)){
            $file = $request->file('banner_right_image');

            $name_old = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = uniqid().''.time().'.'.$extension;
            $path = $file->move('public/Homepage', $name);
    
            $Homebanner->heading_one = $request->heading1;
            $Homebanner->heading_two = $request->heading2;
            $Homebanner->sub_heading = $request->sub_heading;
            $Homebanner->banner_right_img = $path;
            $Homebanner->save() ;

        }
        else
        {
            $Homebanner->heading_one = $request->heading1;
            $Homebanner->heading_two = $request->heading2;
            $Homebanner->sub_heading = $request->sub_heading;
            $Homebanner->save() ;
        }
        return redirect('admin/homebanner');   
    }

    public function createhomeservice(){
        return view('admin.Homepage.createhomeservice');
    }
    public function inserthomeservice(Request $request){
        $request->validate([
            'img_name' => 'required'
        ]);
        
        $file = $request->file('img_name');
        $name_old = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $name = uniqid().''.time().'.'.$extension;
        $path = $file->move('public/Homepage', $name);

        $Homeservices = new Homeservices;

        $Homeservices->title = $request->heading;
        $Homeservices->content = $request->content;
        $Homeservices->img_name = $path;
        $Homeservices->save() ;
        return redirect('admin/homeserviceall');
    }
    public function homeserviceall(){
        $services = Homeservices::get();
        return view('admin.Homepage.homeserviceall', ['services'=>$services]);
    }
    public function homeservice($id){
        $services = Homeservices::where('id', $id)->get();
        return view('admin.Homepage.homeservice', ['services'=>$services]);
    }
    public function updatehomeservice(Request $request){
        $Homeservices = Homeservices::find($request->id);

        $file = $request->file('img_name');
        if(!empty($file)){
            $file = $request->file('img_name');

            $name_old = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = uniqid().''.time().'.'.$extension;
            $path = $file->move('public/Homepage', $name);
    
            $Homeservices->title = $request->heading;
            $Homeservices->content = $request->content;
            $Homeservices->img_name = $path;
            $Homeservices->save() ;

        }
        else
        {
            $Homeservices->title = $request->heading;
            $Homeservices->content = $request->content;
            $Homeservices->save() ;
        }
        return redirect('admin/homeserviceall');   
    }

    public function delete_homeservice($id){
        $Homeservices = Homeservices::find($id);
        if(!empty($Homeservices)){
            $Homeservices->delete();
            return redirect('admin/homeserviceall');
        }else{
            return redirect('admin/homeserviceall');
        }
    }

    // Why choose us 
    public function createhomewhy(){
        return view('admin.Homepage.createhomewhy');
    }
    public function inserthomewhy(Request $request){
        $request->validate([
            'img_name' => 'required'
        ]);
        $file = $request->file('img_name');
        $name_old = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $name = uniqid().''.time().'.'.$extension;
        $path = $file->move('public/Homepage', $name);

        $Homewhys = new HomeWhy;

        $Homewhys->title = $request->heading;
        $Homewhys->content = $request->content;
        $Homewhys->img_name = $path;
        $Homewhys->save() ;
        return redirect('admin/homewhyall');
    }
    public function homewhyall(){
        $whys = HomeWhy::get();
        return view('admin.Homepage.homewhyall', ['whys'=>$whys]);
    }
    public function homewhy($id){
        $whys = HomeWhy::where('id', $id)->get();
        return view('admin.Homepage.homewhy', ['whys'=>$whys]);
    }
    public function updatehomewhy(Request $request){
        
        $Homewhys = HomeWhy::find($request->id);

        $file = $request->file('img_name');
        if(!empty($file)){
            $file = $request->file('img_name');

            $name_old = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = uniqid().''.time().'.'.$extension;
            $path = $file->move('public/Homepage', $name);
    
            $Homewhys->title = $request->heading;
            $Homewhys->content = $request->content;
            $Homewhys->img_name = $path;
            $Homewhys->save() ;

        }
        else
        {
            $Homewhys->title = $request->heading;
            $Homewhys->content = $request->content;
            $Homewhys->save() ;
        }
        return redirect('admin/homewhyall');   
    }

    public function delete_homewhy($id){
        $Homewhys = HomeWhy::find($id);
        if(!empty($Homewhys)){
            $Homewhys->delete();
            return redirect('admin/homewhyall');
        }else{
            return redirect('admin/homewhyall');
        }
    }




    // Client logos
    public function createhomeclient(){
        return view('admin.Homepage.createhomeclient');
    }
    public function inserthomeclient(Request $request){
        $request->validate([
            'img_name' => 'required'
        ]);
        $file = $request->file('img_name');
        $name_old = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $name = uniqid().''.time().'.'.$extension;
        $path = $file->move('public/Homepage', $name);

        $ClientLogo = new ClientLogo;

        $ClientLogo->img_name = $name;
        $ClientLogo->img_path = $path;
        $ClientLogo->save() ;
        return redirect('admin/homeclientall');
    }
    public function homeclientall(){
        $ClientLogo = ClientLogo::get();
        return view('admin.Homepage.homeclientall', ['ClientLogo'=>$ClientLogo]);
    }

    public function homeclient($id){
        $ClientLogo = ClientLogo::where('id', $id)->get();
        return view('admin.Homepage.homeclient', ['ClientLogo'=>$ClientLogo]);
    }
    public function updatehomeclient(Request $request){
        
        $ClientLogo = ClientLogo::find($request->id);

        $file = $request->file('img_name');
        if(!empty($file)){
            $file = $request->file('img_name');

            $name_old = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = uniqid().''.time().'.'.$extension;
            $path = $file->move('public/Homepage', $name);
    
            $ClientLogo->img_name = $name;
            $ClientLogo->img_path = $path;
            $ClientLogo->save() ;

        }
        else
        {
            $ClientLogo->img_name = $name;
            $ClientLogo->img_path = $path;
            $ClientLogo->save() ;
        }
        return redirect('admin/homeclientall');   
    }

    public function delete_homeclient($id){
        $ClientLogo = ClientLogo::find($id);
        if(!empty($ClientLogo)){
            $ClientLogo->delete();
            return redirect('admin/homeclientall');
        }else{
            return redirect('admin/homeclientall');
        }
    }









    // Testimonials
    public function createhometesti(){
        return view('admin.Homepage.createhometesti');
    }
    public function inserthometesti(Request $request){
        $request->validate([
            'heading' => 'required',
            'designation'=> 'required',
            'company' => 'required',
            'img_name' => 'required'
        ]);

        $file = $request->file('img_name');
        $name_old = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $name = uniqid().''.time().'.'.$extension;
        $path = $file->move('public/Homepage', $name);

        $Hometestis = new Testimonial;

        $Hometestis->title = $request->heading;
        $Hometestis->content = $request->content;
        $Hometestis->designation = $request->designation;
        $Hometestis->company = $request->company;        
        $Hometestis->pic_name = $path;
        $Hometestis->save() ;
        return redirect('admin/hometestiall');
    }
    public function hometestiall(){
        $testis = Testimonial::get();
        return view('admin.Homepage.hometestiall', ['testis'=>$testis]);
    }
    public function hometesti($id){
        $testis = Testimonial::where('id', $id)->get();
        return view('admin.Homepage.hometesti', ['testis'=>$testis]);
    }
    public function updatehometesti(Request $request){
        $request->validate([
            'heading' => 'required',
            'designation'=> 'required',
            'company' => 'required',
        ]);

        $Hometestis = Testimonial::find($request->id);

        $file = $request->file('img_name');
        if(!empty($file)){
            $file = $request->file('img_name');

            $name_old = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = uniqid().''.time().'.'.$extension;
            $path = $file->move('public/Homepage', $name);
    
            $Hometestis->title = $request->heading;
            $Hometestis->content = $request->content;
            $Hometestis->designation = $request->designation;
            $Hometestis->company = $request->company;
            $Hometestis->pic_name = $path;
            $Hometestis->save() ;

        }
        else
        {
            $Hometestis->title = $request->heading;
            $Hometestis->content = $request->content;
            $Hometestis->designation = $request->designation;
            $Hometestis->company = $request->company;
            $Hometestis->save() ;
        }
        return redirect('admin/hometestiall');   
    }

    public function delete_hometesti($id){
        $Hometestis = Testimonial::find($id);
        if(!empty($Hometestis)){
            $Hometestis->delete();
            return redirect('admin/hometestiall');
        }else{
            return redirect('admin/hometestiall');
        }
    }





    





    
}
