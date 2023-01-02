<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Service;
use App\Models\Career;
use App\Models\Roles;
use App\Models\Skills;
use App\Models\Homebanner;

// use Illuminate\Support\Facades\Input;
// use Illuminate\Support\Facades\Auth;
// https://www.google.com/search?q=vmoksha+technologies&rlz=1C1GCEB_enIN1013IN1013&oq=vmoksha+technologies&aqs=chrome..69i57.9355j0j1&sourceid=chrome&ie=UTF-8#lrd=0x3bae1480683f3359:0xfcdd7825dd461d19,1,,,

class HomeController extends Controller
{
    //
    public function index(){
        return view('admin.dashboard');
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
    

    public function createblogs(){
        return view('admin.createblogs');
    }

    public function blog_store(Request $request){
        $request->validate([
            'featured_image' => 'required'
        ]);

        $file = $request->file('featured_image');
        $name_old = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $name = uniqid().''.time().'.'.$extension;
        $path = $file->move('public/featured_image', $name);

        $blog = new Blog;
        $blog->title = $request->title;
        $blog->category = $request->category;
        $blog->featured_content = $request->featured_content;
        $blog->featured_image_name = $name;
        $blog->featured_image_path = $path;
        $blog->main_blog = $request->main_blog;
        $Admin_name = \Auth::guard('admin')->user()->name;
        $blog->author = $Admin_name;
        $blog->save();
        return redirect('admin/allblogs');

    }

    public function allblogs(){
        $blog = Blog::Where('status', 1)->get();

        return view('admin.allblog', ['blog'=> $blog]);
    }

    public function blog_detail($id){
        $blog = Blog::where('id', $id)->get();
        return view('admin.blog_detail', ['blog'=> $blog]);
    }

    public function update_blog(Request $request){
        $blog = Blog::find($request->id);

        $file = $request->file('featured_image');
        if(!empty($file)){
            $file = $request->file('featured_image');
            $name_old = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = uniqid().''.time().'.'.$extension;
            $path = $file->move('public/featured_image', $name);
                
            $blog->title = $request->title;
            $blog->category = $request->category;
            $blog->featured_content = $request->featured_content;
            $blog->featured_image_name = $name;
            $blog->featured_image_path = $path;
            $blog->main_blog = $request->main_blog;
            $Admin_name = \Auth::guard('admin')->user()->name;
            $blog->author = $Admin_name;
            $blog->save();
        }
        else
        {
            $blog->title = $request->title;
            $blog->category = $request->category;
            $blog->featured_content = $request->featured_content;
            $blog->main_blog = $request->main_blog;
            $Admin_name = \Auth::guard('admin')->user()->name;
            $blog->author = $Admin_name;
            $blog->save();
        }
        return redirect('admin/allblogs');
    }

    public function delete_blog($id){
        $blog = Blog::find($id);
        if(!empty($blog)){
            $blog->delete();
            return redirect('admin/allblogs');
        }else{
            return redirect('admin/allblogs');
        }
    }










}
