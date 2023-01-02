<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobApplication;
use App\Mail\contact;


use Illuminate\Http\Request;
use App\Models\PostAProject;
use App\Models\ApplyJob;
use App\Models\Blog;
use App\Models\Career;
use App\Models\Roles;
use App\Models\Skills;
use App\Models\CaseFirst;
use App\Models\Service;
use App\Models\Industry;
use App\Models\ServiceDetails;
use App\Models\IndustryDetail;
use App\Models\Homeservices;
use App\Models\HomeWhy;
use App\Models\Testimonial;
use App\Models\ClientLogo;
use App\Models\AboutFirst;
use App\Models\FirstMission;
use App\Models\FirstExpert;
use App\Models\IndustryFirst;
use App\Models\IndustrySecond;
use App\Models\CareerFirst;
use App\Models\CareerSecond;
use App\Models\AboutTeam;



class Homepage extends Controller
{
    //
    public function contactemail(){
        return view('mails/contactmail');
    }
    public function jobemail(){
        return view('mails/jobapplication');
    }
    public function index()
    {
        $blog = Blog::Where('status', 1)->take(3)->get();
        $Homeservices = Homeservices::take(6)->get();
        $HomeWhy = HomeWhy::take(4)->get();
        $ClientLogo = ClientLogo::get();
        $Testimonial = Testimonial::get();

        return view('home', ['blog'=> $blog], ['Homeservices'=>$Homeservices, 'HomeWhy'=>$HomeWhy, 'ClientLogo'=>$ClientLogo, 'Testimonial'=>$Testimonial]);
    }

    public function about(){
        $AboutFirst = AboutFirst::take(1)->get();
        $FirstMission = FirstMission::get();
        $FirstExpert = FirstExpert::get();
        $AboutTeam = AboutTeam::get();
        return view('about', ['AboutFirst'=> $AboutFirst], ['FirstMission'=>$FirstMission, 'FirstExpert'=>$FirstExpert, 'AboutTeam'=> $AboutTeam]);
    }

    public function services(){
        $services = Service::get();
        $blog = Blog::Where('status', 1)->take(3)->get();
        return view('services', ['blog'=> $blog], ['services'=>$services]);
    }
    public function servicesdetail($id){
        $services = Service::where('id', $id)->get();
        $ServiceDetails = ServiceDetails::where('service_id', $id)->get();
        $blog = Blog::Where('status', 1)->take(3)->get();
        return view('servicedetail', ['services'=> $services], ['ServiceDetails'=>$ServiceDetails, 'blog'=> $blog]);
    }

    public function industries(){
        $industries = Industry::get();
        $blog = Blog::Where('status', 1)->take(3)->get();
        return view('industries', ['blog'=> $blog], ['industries'=>$industries]);
    }

    public function industrydetail($id){
        $industries = Industry::where('id', $id)->get();
        $IndustryFirst = IndustryFirst::where('industry_id', $id)->get();
        $IndustrySecond = IndustrySecond::where('industry_id', $id)->get();
        $IndustryDetails = IndustryDetail::where('industry_id', $id)->get();
        $blog = Blog::Where('status', 1)->take(3)->get();
        return view('industrydetail', ['industries'=> $industries], ['IndustryFirst'=>$IndustryFirst, 'IndustrySecond'=>$IndustrySecond, 'IndustryDetails'=>$IndustryDetails, 'blog'=> $blog]);
    }


    public function blog_detail(){
        $blog = Blog::Where('status', 1)->take(3)->get();
        return view('blog_detail', ['blog'=> $blog]);
    }

   
    // public function test(){
    //     $blog = Blog::Where('status', 1)->take(3)->get();
    //     return view('test', ['blog'=> $blog]);

    //     // $test = Blog::Where('status', 1)->get();
    //     // return view('test', ['test123'=> $test]);
    // }
    public function all_blogs(){
        $blog = Blog::Where('status', 1)->get();
        return view('all_blogs',  ['blog'=> $blog]);
    }

    public function blog_details($id){
        $blog1 = Blog::Where('id', $id)->where('status', 1)->take(1)->get();
        $blog = Blog::Where('status', 1)->get();
        
        $cat1 = Blog::Where('category', 'Software Development')->count();
        $cat2 = Blog::Where('category', 'Website Development')->count();
        $cat3 = Blog::Where('category', 'Artificial Intelligence')->count();
        $cat4 = Blog::Where('category', 'Information Security')->count();
        $cat5 = Blog::Where('category', 'UI/UX')->count();
        $cat6 = Blog::Where('category', 'Big Data & predictive Analysis')->count();
        $cat7 = Blog::Where('category', 'Software & Hitech')->count();
        $cat8 = Blog::Where('category', 'Tele communication')->count();
        $cat9 = Blog::Where('category', 'Automotive')->count();
        $cat10 = Blog::Where('category', 'Banking & Finance')->count();
        $cat11 = Blog::Where('category', 'Agriculture')->count();
        $cat12 = Blog::Where('category', 'E business & Retail')->count();
        $cat13 = Blog::Where('category', 'Education')->count();
        $cat14 = Blog::Where('category', 'Health Care')->count();
        $cat15 = Blog::Where('category', 'Logistics')->count();
        return view('blog_details',  ['blog'=> $blog], ['blog1'=>$blog1, 'cat1'=>$cat1, 'cat2'=>$cat2, 'cat3'=>$cat3, 'cat4'=>$cat4, 'cat5'=>$cat5, 'cat6'=>$cat6, 'cat7'=>$cat7, 'cat8'=>$cat8, 'cat9'=>$cat9, 'cat10'=>$cat10, 'cat11'=>$cat11, 'cat12'=>$cat12, 'cat13'=>$cat13, 'cat14'=>$cat14, 'cat15'=>$cat15]);
    }

    public function career(){
        $blog = Blog::Where('status', 1)->take(3)->get();
        $CareerFirst = CareerFirst::take(1)->get();
        $CareerSecond = CareerSecond::get();
        $career = Career::get();
        return view('career', ['blog'=> $blog], ['career'=> $career, 'CareerFirst'=>$CareerFirst, 'CareerSecond'=>$CareerSecond]);
    }

    public function career_detail($id){
        $blog = Blog::Where('status', 1)->take(3)->get();
        $career = Career::where('id', $id)->get();
        $roles = Roles::where('carrer_id', $id)->get();
        $skills = Skills::where('carrer_id', $id)->get();

        return view('career_detail', ['blog'=> $blog], ['career'=> $career, 'roles'=> $roles, 'skills' => $skills]);
    }
    public function Apply_job(Request $request){
        $request->validate([
            'title' => 'name|string',
            'email' => 'required',
            'number' => 'required',
            'files' => 'required',
            "files" => "required|mimes:pdf|max:10000",
            "files" => "required|mimetypes:application/pdf|max:10000"
        ]);

        $file = $request->file('files');
        $name_old = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $name = uniqid().''.time().'.'.$extension;
        $path = $file->move('public/Files', $name);

        $career = new ApplyJob;
        $career->job_Id = $request->carrer_id;
        $career->name = $request->name;
        $career->email = $request->email;
        $career->phone = $request->number;
        $career->filename = $name;
        $career->filepath = $path;
        $career->save();
        $email_id = $request->email;
        // default mailer
        
        $data= array(
            'name' => $request->name,
            'email' => $request->email,
        );

        Mail::to($email_id)->send(new JobApplication($data));

        // mailgun driver 
        // Mail::mailer('mailgun')->to($email_id)->send(new JobApplication());

        // custom mail driver 
        // Mail::mailer('new_mailgun')->to($email_id)->send(new JobApplication());
        \Session::flash('alert_class', 'The form has been submitted, we will get back to you soon.!');
        return redirect('career');

    }

    public function pricing(){
        return view('pricing');
    }

    public function contact(){
        return view('contact');
    }

    public function add_contact(Request $req){
        $req->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'number' => 'required',          
        ]);
        $number = $req->number;
        $code= $req->c_code;
        $fullnumber = $code.''.$number;
        $question = new PostAProject;
        $question->name = $req->name;
        $question->email = $req->email;
        $question->phone = $fullnumber;
        $question->company = $req->company;
        $question->domain = $req->domain;
        $question->company_size = $req->c_size;
        $question->service = $req->service;
        $question->budget = $req->budget;
        $question->message = $req->message;
        $question->save();
        $email_id=$req->email;
        
        $data= array(
            'name' => $req->name,
            'email' => $req->email,
        );
        Mail::to($email_id)->send(new contact($data));
        \Session::flash('alert_class', 'The form has been submitted, we will get back to you soon.!');
        return redirect('contact');

    }

    public function casestudy(){
        $CaseFirst = CaseFirst::get();
        $blog = Blog::Where('status', 1)->take(3)->get();

        return view('casestudy', ['CaseFirst'=>$CaseFirst, 'blog'=> $blog]);
    }

    public function test(){
        $CaseFirst = CaseFirst::get();
        return view('test', ['CaseFirst'=>$CaseFirst]);
    }

    public function privacy_policy(){
        return view('privacy_policy');
    }
    public function terms_and_conditions(){
        return view('terms_and_conditions');
    }
    

}
