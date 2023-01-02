<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Industry;
use App\Models\IndustryDetail;
use Illuminate\Support\Str;
use App\Models\IndustryFirst;
use App\Models\IndustrySecond;


class IndustryController extends Controller
{
    // industry page
    public function industrycreate(){
        return view('admin.Industry.industrycreate');
    }
    public function industryinsert(Request $request){
        $request->validate([
            'featured_img' => 'required'
        ]);
        $featured_file = $request->file('featured_img');
        $featured_name_old = $featured_file->getClientOriginalName();
        $featured_extension = $featured_file->getClientOriginalExtension();
        $featured_name = uniqid().''.time().'.'.$featured_extension;
        $featured_path = $featured_file->move('public/industry', $featured_name);
       
        $heading = $request->heading;
        $shortname = Str::lower(str_replace(' ', '', $heading));
        $industry = new Industry;

        $industry->title = $request->heading;
        $industry->shortname = $shortname;
        $industry->featured_content = $request->featured_content;
        $industry->featured_image_name = $featured_name;
        $industry->featured_image_path = $featured_path;
        $industry->save() ;
        return redirect('admin/industryall');
    }
    public function industryall(){
        $testis = Industry::get();
        return view('admin.Industry.industryall', ['testis'=>$testis]);
    }
    public function industrydetail($id){
        $testis = Industry::where('id', $id)->get();
        return view('admin.Industry.industrydetail', ['testis'=>$testis]);
    }
    public function industryupdate(Request $request){
        $industry = Industry::find($request->id);

        $featured_file = $request->file('featured_img');
        if(!empty($featured_file)){
            $featured_name_old = $featured_file->getClientOriginalName();
            $featured_extension = $featured_file->getClientOriginalExtension();
            $featured_name = uniqid().''.time().'.'.$featured_extension;
            $featured_path = $featured_file->move('public/industry', $featured_name);
            $industry->featured_image_name = $featured_name;
            $industry->featured_image_path = $featured_path;
        }

        
        $heading = $request->heading;
        $shortname = Str::lower(str_replace(' ', '', $heading));

        $industry->title = $request->heading;
        $industry->shortname = $shortname;
        $industry->featured_content = $request->featured_content;
        
        $industry->save() ;
        return redirect('admin/industryall');   
    }

    public function industrydelete($id){
        $industry = Industry::find($id);
        if(!empty($industry)){
            $industry->delete();
            return redirect('admin/industryall');
        }else{
            return redirect('admin/industryall');
        }
    }





    // industry detail second
    public function industryfirstcreate($industry_id){
        $industry = Industry::find($industry_id);
        return view('admin.Industry.industryfirstcreate', ['industry_id'=>$industry_id, 'industry'=>$industry]);
    }
    public function industryfirstinsert(Request $request){
        $request->validate([
            'img' => 'required'
        ]);
        $file = $request->file('img');
        $name_old = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $name = uniqid().''.time().'.'.$extension;
        $path = $file->move('public/industry', $name);
       
        $industryfirst = new IndustryFirst;

        $industryfirst->industry_id = $request->industry_id;
        $industryfirst->title = $request->heading;
        $industryfirst->content = $request->content;
        $industryfirst->content_2 = $request->content_2;
        $industryfirst->content_3 = $request->content_3;
        $industryfirst->image_name = $name;
        $industryfirst->image_path = $path;
        $industryfirst->save() ;
        return redirect('admin/industryfirstall/'.$request->industry_id);
    }
    public function industryfirstall($industry_id){
        $industry = Industry::where('id', $industry_id)->get();
        $testis = IndustryFirst::where('industry_id', $industry_id)->get();
        return view('admin.Industry.industryfirstall', ['testis'=>$testis], ['industry_id'=>$industry_id, 'industry'=>$industry]);
    }
    public function industryfirstdetail($id, $industry_id){
        $industry = Industry::where('id', $industry_id)->get();
        $testis = IndustryFirst::where('id', $id)->get();
        return view('admin.Industry.industryfirstdetail', ['testis'=>$testis], ['industry_id'=>$industry_id, 'industry'=>$industry]);
    }
    public function industryfirstupdate(Request $request){
        $industryfirst = IndustryFirst::find($request->id);

        $file = $request->file('img');
        if(!empty($file)){
            $name_old = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = uniqid().''.time().'.'.$extension;
            $path = $file->move('public/industry', $name);
            $industryfirst->image_name = $name;
            $industryfirst->image_path = $path;
        }

        $industryfirst->title = $request->heading;
        $industryfirst->content = $request->content;
        $industryfirst->content_2 = $request->content_2;
        $industryfirst->content_3 = $request->content_3;        
        $industryfirst->save() ;
        return redirect('admin/industryfirstall/'.$request->industry_id);   
    }

    public function industryfirstdelete($id, $industry_id){
        $industryfirst = IndustryFirst::find($id);
        if(!empty($industryfirst)){
            $industryfirst->delete();
            return redirect('admin/industryfirstall/'.$industry_id);
        }else{
            return redirect('admin/industryfirstall/'.$industry_id);
        }
    }









    // industry detail second
    public function industrysecondcreate($industry_id){
        $industry = Industry::where('id', $industry_id)->get();
        return view('admin.Industry.industrysecondcreate', ['industry_id'=>$industry_id, 'industry'=>$industry]);
    }
    public function industrysecondinsert(Request $request){
        $request->validate([
            'img' => 'required'
        ]);
        $file = $request->file('img');
        $name_old = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $name = uniqid().''.time().'.'.$extension;
        $path = $file->move('public/industry', $name);
       
        $industrysecond = new IndustrySecond;

        $industrysecond->industry_id = $request->industry_id;
        $industrysecond->content = $request->content;
        $industrysecond->content_2 = $request->content_2;
        $industrysecond->content_3 = $request->content_3;
        $industrysecond->image_name = $name;
        $industrysecond->image_path = $path;
        $industrysecond->save() ;
        return redirect('admin/industrysecondall/'.$request->industry_id);
    }
    public function industrysecondall($industry_id){
        $industry = Industry::where('id', $industry_id)->get();
        $testis = IndustrySecond::where('industry_id', $industry_id)->get();
        return view('admin.Industry.industrysecondall', ['testis'=>$testis], ['industry_id'=>$industry_id, 'industry'=>$industry]);
    }
    public function industryseconddetail($id, $industry_id){
        $industry = Industry::where('id', $industry_id)->get();
        $testis = IndustrySecond::where('id', $id)->get();
        return view('admin.Industry.industryseconddetail', ['testis'=>$testis], ['industry_id'=>$industry_id, 'industry'=>$industry]);
    }
    public function industrysecondupdate(Request $request){
        $industrysecond = IndustrySecond::find($request->id);

        $file = $request->file('img');
        if(!empty($file)){
            $name_old = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = uniqid().''.time().'.'.$extension;
            $path = $file->move('public/industry', $name);
            $industrysecond->image_name = $name;
            $industrysecond->image_path = $path;
        }

        $industrysecond->content = $request->content;
        $industrysecond->content_2 = $request->content_2;
        $industrysecond->content_3 = $request->content_3;        
        $industrysecond->save() ;
        return redirect('admin/industrysecondall/'.$request->industry_id);   
    }

    public function industryseconddelete($id, $industry_id){
        $industrysecond = IndustrySecond::find($id);
        if(!empty($industrysecond)){
            $industrysecond->delete();
            return redirect('admin/industrysecondall/'.$industry_id);
        }else{
            return redirect('admin/industrysecondall/'.$industry_id);
        }
    }












    // industry detail page
    public function industrypagecreate($industry_id){
        $industry = Industry::where('id', $industry_id)->get();
        return view('admin.Industry.industrypagecreate', ['industry_id'=>$industry_id, 'industry'=>$industry]);
    }
    public function industrypageinsert(Request $request){
        $request->validate([
            'img' => 'required'
        ]);
        $file = $request->file('img');
        $name_old = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $name = uniqid().''.time().'.'.$extension;
        $path = $file->move('public/industry', $name);
       
        $industrypage = new IndustryDetail;

        $industrypage->industry_id = $request->industry_id;
        $industrypage->content = $request->content;
        $industrypage->content_2 = $request->content_2;
        $industrypage->image_name = $name;
        $industrypage->image_path = $path;
        $industrypage->save() ;
        return redirect('admin/industrypageall/'.$request->industry_id);
    }
    public function industrypageall($industry_id){
        $industry = Industry::where('id', $industry_id)->get();
        $testis = IndustryDetail::where('industry_id', $industry_id)->get();
        return view('admin.Industry.industrypageall', ['testis'=>$testis], ['industry_id'=>$industry_id, 'industry'=>$industry]);
    }
    public function industrypagedetail($id, $industry_id){
        $industry = Industry::where('id', $industry_id)->get();
        $testis = IndustryDetail::where('id', $id)->get();
        return view('admin.Industry.industrypagedetail', ['testis'=>$testis], ['industry_id'=>$industry_id, 'industry'=>$industry]);
    }
    public function industrypageupdate(Request $request){
        $industrypage = IndustryDetail::find($request->id);

        $file = $request->file('img');
        if(!empty($file)){
            $name_old = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = uniqid().''.time().'.'.$extension;
            $path = $file->move('public/industry', $name);
            $industrypage->image_name = $name;
            $industrypage->image_path = $path;
        }

        $industrypage->content = $request->content;
        $industrypage->content_2 = $request->content_2;        
        $industrypage->save() ;
        return redirect('admin/industrypageall/'.$request->industry_id);   
    }

    public function industrypagedelete($id, $industry_id){
        $industrypage = IndustryDetail::find($id);
        if(!empty($industrypage)){
            $industrypage->delete();
            return redirect('admin/industrypageall/'.$industry_id);
        }else{
            return redirect('admin/industrypageall/'.$industry_id);
        }
    }



}
