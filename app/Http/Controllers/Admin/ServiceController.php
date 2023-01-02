<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceDetails;
use Illuminate\Support\Str;


class ServiceController extends Controller
{
    // Service page
    public function servicecreate(){
        return view('admin.Service.servicecreate');
    }
    public function serviceinsert(Request $request){
        $request->validate([
            'featured_img' => 'required'
        ]);
        $featured_file = $request->file('featured_img');
        $featured_name_old = $featured_file->getClientOriginalName();
        $featured_extension = $featured_file->getClientOriginalExtension();
        $featured_name = uniqid().''.time().'.'.$featured_extension;
        $featured_path = $featured_file->move('public/Service', $featured_name);

        $heading = $request->heading;
        $shortname = Str::lower(str_replace(' ', '', $heading));
        $Service = new Service;

        $Service->title = $request->heading;
        $Service->shortname = $shortname;
        $Service->featured_content = $request->featured_content;
        $Service->featured_image_name = $featured_name;
        $Service->featured_image_path = $featured_path;
        $Service->save() ;
        return redirect('admin/serviceall');
    }
    public function serviceall(){
        $testis = Service::get();
        return view('admin.Service.serviceall', ['testis'=>$testis]);
    }
    public function servicedetail($id){
        $testis = Service::where('id', $id)->get();
        return view('admin.Service.servicedetail', ['testis'=>$testis]);
    }
    public function serviceupdate(Request $request){
        $Service = Service::find($request->id);

        $featured_file = $request->file('featured_img');
        if(!empty($featured_file)){
            $featured_name_old = $featured_file->getClientOriginalName();
            $featured_extension = $featured_file->getClientOriginalExtension();
            $featured_name = uniqid().''.time().'.'.$featured_extension;
            $featured_path = $featured_file->move('public/Service', $featured_name);
            $Service->featured_image_name = $featured_name;
            $Service->featured_image_path = $featured_path;
        }

        $heading = $request->heading;
        $shortname = Str::lower(str_replace(' ', '', $heading));

        $Service->title = $request->heading;
        $Service->shortname = $shortname;
        $Service->featured_content = $request->featured_content;
        
        $Service->save() ;
        return redirect('admin/serviceall');   
    }

    public function servicedelete($id){
        $Service = Service::find($id);
        if(!empty($Service)){
            $Service->delete();
            return redirect('admin/serviceall');
        }else{
            return redirect('admin/serviceall');
        }
    }






    // Service detail page
    public function servicepagecreate($service_id){
        return view('admin.Service.servicepagecreate', ['service_id'=>$service_id]);
    }
    public function servicepageinsert(Request $request){
        $request->validate([
            'img' => 'required'
        ]);
        $file = $request->file('img');
        $name_old = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $name = uniqid().''.time().'.'.$extension;
        $path = $file->move('public/service', $name);
       
        $servicepage = new ServiceDetails;

        $servicepage->service_id = $request->service_id;
        $servicepage->title = $request->heading;
        $servicepage->content = $request->content;
        $servicepage->image_name = $name;
        $servicepage->image_path = $path;
        $servicepage->save() ;
        return redirect('admin/servicepageall/'.$request->service_id);
    }
    public function servicepageall($service_id){
        $service = Service::where('id', $service_id)->get();
        $testis = ServiceDetails::where('service_id', $service_id)->get();
        return view('admin.Service.servicepageall', ['testis'=>$testis], ['service_id'=>$service_id, 'service'=>$service]);
    }
    public function servicepagedetail($id, $service_id){
        $testis = ServiceDetails::where('id', $id)->get();
        $service = Service::where('id', $service_id)->get();
        return view('admin.Service.servicepagedetail', ['testis'=>$testis], ['service_id'=>$service_id, 'service'=>$service]);
    }
    public function servicepageupdate(Request $request){
        $servicepage = ServiceDetails::find($request->id);

        $file = $request->file('img');
        if(!empty($file)){
            $name_old = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = uniqid().''.time().'.'.$extension;
            $path = $file->move('public/service', $name);
            $servicepage->image_name = $name;
            $servicepage->image_path = $path;
        }

        $servicepage->title = $request->heading;
        $servicepage->content = $request->content;
        
        $servicepage->save() ;
        return redirect('admin/servicepageall/'.$request->service_id);   
    }

    public function servicepagedelete($id, $service_id){
        $servicepage = ServiceDetails::find($id);
        if(!empty($servicepage)){
            $servicepage->delete();
            return redirect('admin/servicepageall/'.$service_id);
        }else{
            return redirect('admin/servicepageall/'.$service_id);
        }
    }


}
