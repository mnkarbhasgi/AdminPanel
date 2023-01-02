<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Career;
use App\Models\Roles;
use App\Models\Skills;
use App\Models\CareerFirst;
use App\Models\CareerSecond;
use App\Models\ApplyJob;
use App\Models\PostAProject;


class CareerController extends Controller
{
        // career page first section
        public function careerfirstcreate(){
            return view('admin.Career.careerfirstcreate');
        }
        public function careerfirstinsert(Request $request){
            $request->validate([
                'img' => 'required'
            ]);
                $featured_file = $request->file('img');
            $featured_name_old = $featured_file->getClientOriginalName();
            $featured_extension = $featured_file->getClientOriginalExtension();
            $featured_name = uniqid().''.time().'.'.$featured_extension;
            $featured_path = $featured_file->move('public/Career', $featured_name);
    
            $careerfirst = new CareerFirst;
    
            $careerfirst->content = $request->content;
            $careerfirst->content_2 = $request->content_2;
            $careerfirst->image_name = $featured_name;
            $careerfirst->image_path = $featured_path;
            $careerfirst->save() ;
            return redirect('admin/careerfirstall');
        }
        public function careerfirstall(){
            $testis = CareerFirst::get();
            return view('admin.Career.careerfirstall', ['testis'=>$testis]);
        }
        public function careerfirstdetail($id){
            $testis = CareerFirst::where('id', $id)->get();
            return view('admin.Career.careerfirstdetail', ['testis'=>$testis]);
        }
        public function careerfirstupdate(Request $request){
            $careerfirst = CareerFirst::find($request->id);
    
            $featured_file = $request->file('img');
            if(!empty($featured_file)){
                $featured_name_old = $featured_file->getClientOriginalName();
                $featured_extension = $featured_file->getClientOriginalExtension();
                $featured_name = uniqid().''.time().'.'.$featured_extension;
                $featured_path = $featured_file->move('public/Career', $featured_name);
                $careerfirst->featured_image_name = $featured_name;
                $careerfirst->featured_image_path = $featured_path;
            }
        
            $careerfirst->content = $request->content;
            $careerfirst->content_2 = $request->content_2;
            $careerfirst->save() ;
            return redirect('admin/careerfirstall');   
        }
    
        public function careerfirstdelete($id){
            $careerfirst = CareerFirst::find($id);
            if(!empty($careerfirst)){
                $careerfirst->delete();
                return redirect('admin/careerfirstall');
            }else{
                return redirect('admin/careerfirstall');
            }
        }
    





        // career page second section
        public function careersecondcreate(){
            return view('admin.Career.careersecondcreate');
        }
        public function careersecondinsert(Request $request){
            $request->validate([
                'img' => 'required'
            ]);
            $featured_file = $request->file('img');
            $featured_name_old = $featured_file->getClientOriginalName();
            $featured_extension = $featured_file->getClientOriginalExtension();
            $featured_name = uniqid().''.time().'.'.$featured_extension;
            $featured_path = $featured_file->move('public/Career', $featured_name);
    
            $careersecond = new CareerSecond;
    
            $careersecond->heading = $request->heading;
            $careersecond->content = $request->content;
            $careersecond->image_name = $featured_name;
            $careersecond->image_path = $featured_path;
            $careersecond->save() ;
            return redirect('admin/careersecondall');
        }
        public function careersecondall(){
            $testis = CareerSecond::get();
            return view('admin.Career.careersecondall', ['testis'=>$testis]);
        }
        public function careerseconddetail($id){
            $testis = CareerSecond::where('id', $id)->get();
            return view('admin.Career.careerseconddetail', ['testis'=>$testis]);
        }
        public function careersecondupdate(Request $request){
            $careersecond = CareerSecond::find($request->id);
    
            $featured_file = $request->file('img');
            if(!empty($featured_file)){
                $featured_name_old = $featured_file->getClientOriginalName();
                $featured_extension = $featured_file->getClientOriginalExtension();
                $featured_name = uniqid().''.time().'.'.$featured_extension;
                $featured_path = $featured_file->move('public/Career', $featured_name);
                $careersecond->featured_image_name = $featured_name;
                $careersecond->featured_image_path = $featured_path;
            }
    
            $careersecond->heading = $request->heading;
            $careersecond->content = $request->content;
            $careersecond->save() ;
            return redirect('admin/careersecondall');   
        }
    
        public function careerseconddelete($id){
            $careersecond = CareerSecond::find($id);
            if(!empty($careersecond)){
                $careersecond->delete();
                return redirect('admin/careersecondall');
            }else{
                return redirect('admin/careersecondall');
            }
        }
    



        // Career Hiring Page 
        public function createcareer(){
            return view('admin.Career.createcareer');
        }
    
        public function career_store(Request $request){
            $request->validate([
                'title' => 'required',
                'location' => 'required',
                'experience' => 'required',
                'opening' => 'required',
                'roles.*' => 'required',
                'skills.*' => 'required',
            ]);
            $career = new Career;
    
            $career->title = $request->title;
            $career->location = $request->location;
            $career->experience = $request->experience;
            $career->openings = $request->opening;
            $career->jobtype = $request->jobtype;
            $career->brief = $request->brief;
            
            $career->save();
            $career_id = $career->id;
            foreach( \Request::get('roles') as $new_roles) {       
                $roles = new Roles;
                $roles->carrer_id = $career_id;
                $roles->roles = $new_roles;
                $roles->save();
            }
            foreach( \Request::get('skills') as $new_skills) {       
                $skills = new Skills;
                $skills->carrer_id = $career_id;
                $skills->skills = $new_skills;
                $skills->save();
            }
    
            
            return redirect('admin/allcareer');
    
        }
    
        public function allcareer(){
            $career = Career::Where('status', 1)->get();
            return view('admin.Career.allcareer', ['career'=> $career]);
        }
    
        public function career_detail($id){
            $career = Career::where('id', $id)->get();
            $roles = Roles::where('carrer_id', $id)->get();
            $skills = Skills::where('carrer_id', $id)->get();
            return view('admin.Career.career_detail', ['career'=> $career], ['roles'=> $roles, 'skills' => $skills]);
        }
    
        public function update_career(Request $request){
            $request->validate([
                'title' => 'required',
                'location' => 'required',
                'experience' => 'required',
                'opening' => 'required',
                'roles.*' => 'required',
                'skills.*' => 'required',
            ]);
            
            $career = Career::find($request->id);
    
            $career->title = $request->title;
            $career->location = $request->location;
            $career->experience = $request->experience;
            $career->openings = $request->opening;
            $career->jobtype = $request->jobtype;
            $career->brief = $request->brief;
            $career->save(); 
            $career_id = $career->id;
            
            $role_id_all = $request->input('roles_id');
            $role_all = $request->input('roles');

            if(!empty($role_all)){
                $count = count($role_all);
                for($i = 0; $i < $count; ++$i) 
                {
                    $c_id = $role_id_all[$i];
                    $roles = Roles::find($c_id);
                    $roles->roles = $role_all[$i];
                    $roles->save();
                }
            }
    
            $skills_id_all = $request->input('skills_id');
            $skills_all = $request->input('skills');
            if(!empty($skills_all)){
                $count2 = count($skills_all);
                for($j = 0; $j < $count2; ++$j) 
                {
                    $s_c_id = $skills_id_all[$j];
                    $skills = Skills::find($s_c_id);
                    $skills->skills = $skills_all[$j];
                    $skills->save();
                }
            }

            
            $data1 = \Request::get('roles2');
            if(!empty($data1)){
                foreach( \Request::get('roles2') as $new_roles) {       
                    $roles = new Roles;
                    $roles->carrer_id = $career_id;
                    $roles->roles = $new_roles;
                    $roles->save();
                }
            }
            $data2 = \Request::get('skills2');
            if(!empty($data2)){
                foreach( \Request::get('skills2') as $new_skills) {       
                    $skills = new Skills;
                    $skills->carrer_id = $career_id;
                    $skills->skills = $new_skills;
                    $skills->save();
                }
            }
    
            return redirect('admin/allcareer');
        }
    
        public function delete_career($id){
            $blog = Career::find($id);
            if(!empty($blog)){
                $blog->delete();
                return redirect('admin/allcareer');
            }else{
                return redirect('admin/allcareer');
            }
        }
    
    
        public function delete_skills(Request $request){
            $id = $request->skill_id;
            $skills = Skills::find($id);
            if(!empty($skills)){
                $skills->delete();
                return 'success';
            }else{
                return 'Not success';
            }
        }
    
        public function delete_roles(Request $request){
            $id = $request->role_id;
            $roles = Roles::find($id);
            if(!empty($roles)){
                $roles->delete();
                return 'success';
            }else{
                return 'Not success';
            }
        }

        public function allapplication(){
            $Apply_job = ApplyJob::latest()->get();
            return view('admin.Career.allapplication', ['Apply_job'=> $Apply_job]);
        }

        public function application_detail($id){
            $ApplyJob = ApplyJob::find($id);
            $job_id = $ApplyJob['job_Id'];
            $career = Career::where('id', $job_id)->get();
            $roles = Roles::where('carrer_id', $job_id)->get();
            $skills = Skills::where('carrer_id', $job_id)->get();
            return view('admin.Career.application_detail', ['ApplyJob'=>$ApplyJob], ['career'=> $career, 'roles'=> $roles, 'skills' => $skills]);
        }

        public function contactlist(){
            $PostAProject = PostAProject::latest()->get();
            return view('admin.contactlist', ['PostAProject'=> $PostAProject]);
        }

        public function contactlistdelete(Request $request){
            $id = $request->id;
            $PostAProject = PostAProject::find($id);
            if(!empty($PostAProject)){
                $PostAProject->delete();
                return redirect('admin/contactlist');
            }else{
                return redirect('admin/contactlist');
            }
        }

    
    
    
}
