<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homepage;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\HomepageController;
use App\Http\Controllers\Admin\AboupageController;
use App\Http\Controllers\Admin\CasestudyController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\IndustryController;
use App\Http\Controllers\Admin\CareerController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// "version": "v6.1.2",


// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', [Homepage::class, 'index'])->name('home');
Route::get('/welcome', function () {
    return view('welcome');
});
// Route::get('/mail', function () {
//     return view('contactmail');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/contactemail', [Homepage::class, 'contactemail'])->name('contactemail');
Route::get('/jobemail', [Homepage::class, 'jobemail'])->name('jobemail');
Route::get('/about', [Homepage::class, 'about'])->name('about');
Route::get('/services', [Homepage::class, 'services'])->name('services');
Route::get('/servicesdetail/{id}', [Homepage::class, 'servicesdetail'])->name('servicesdetail');
Route::get('/industries', [Homepage::class, 'industries'])->name('industries');
Route::get('/industrydetail/{id}', [Homepage::class, 'industrydetail'])->name('industrydetail');
Route::get('/all_blogs', [Homepage::class, 'all_blogs'])->name('all_blogs');
Route::get('/blog_details/{id}', [Homepage::class, 'blog_details'])->name('blog_details');

// Route::view('/test', [Homepage::class, 'test'])->name('test');

Route::get('/career', [Homepage::class, 'career'])->name('career');

Route::get('/career_detail/{id}', [Homepage::class, 'career_detail'])->name('career_detail');
Route::post('/Apply_job', [Homepage::class, 'Apply_job'])->name('Apply_job');
// Route::post('/add_career_detail', [Homepage::class, 'add_career_detail'])->name('add_career_detail');

Route::view('/pricing', [Homepage::class, 'contact'])->name('pricing');

Route::view('/contact', [Homepage::class, 'contact'])->name('contact');
Route::post('/add_contact', [Homepage::class, 'add_contact'])->name('add_contact');

Route::get('/casestudy', [Homepage::class, 'casestudy'])->name('casestudy');
Route::get('/test', [Homepage::class, 'test'])->name('test');
Route::get('/privacy_policy', [Homepage::class, 'privacy_policy'])->name('privacy_policy');
Route::get('/terms_and_conditions', [Homepage::class, 'terms_and_conditions'])->name('terms_and_conditions');



// Route::get('/new/{nid}', [Homepage::class, 'new'])->name('new');
// Route::view('/test', [Homepage::class, 'test'])->name('test');

// admin 
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::namespace('Auth')->middleware('guest:admin')->group(function(){
        // Route::get('login', 'AuthenticatedSessionController@create')->name('login');
        // Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('adminlogin');
    });
    Route::middleware('admin')->group(function(){
        Route::get('/', [HomeController::class,'index']);
        Route::get('dashboard', [HomeController::class,'dashboard'])->name('dashboard');
        // Homepage
        // banner 
        // Route::get('createhomebanner', [HomepageController::class,'createhomebanner'])->name('createhomebanner');
        Route::post('inserthomebanner', [HomepageController::class,'inserthomebanner'])->name('inserthomebanner');
        Route::get('homebanner', [HomepageController::class,'homebanner'])->name('homebanner');
        Route::put('homebannerupdate', [HomepageController::class,'homebannerupdate'])->name('homebannerupdate');
        // Services 
        Route::get('createhomeservice', [HomepageController::class,'createhomeservice'])->name('createhomeservice');
        Route::post('inserthomeservice', [HomepageController::class,'inserthomeservice'])->name('inserthomeservice');
        Route::get('homeserviceall', [HomepageController::class,'homeserviceall'])->name('homeserviceall');
        Route::get('homeservice/{id}', [HomepageController::class,'homeservice'])->name('homeservice');
        Route::put('updatehomeservice', [HomepageController::class,'updatehomeservice'])->name('updatehomeservice');
        Route::get('delete_homeservice/{id}', [HomepageController::class, 'delete_homeservice'])->name('delete_homeservice');
        // Why Us
        Route::get('createhomewhy', [HomepageController::class,'createhomewhy'])->name('createhomewhy');
        Route::post('inserthomewhy', [HomepageController::class,'inserthomewhy'])->name('inserthomewhy');
        Route::get('homewhyall', [HomepageController::class,'homewhyall'])->name('homewhyall');
        Route::get('homewhy/{id}', [HomepageController::class,'homewhy'])->name('homewhy');
        Route::put('updatehomewhy', [HomepageController::class,'updatehomewhy'])->name('updatehomewhy');
        Route::get('delete_homewhy/{id}', [HomepageController::class, 'delete_homewhy'])->name('delete_homewhy');
        // Why Us
        Route::get('createhomeclient', [HomepageController::class,'createhomeclient'])->name('createhomeclient');
        Route::post('inserthomeclient', [HomepageController::class,'inserthomeclient'])->name('inserthomeclient');
        Route::get('homeclientall', [HomepageController::class,'homeclientall'])->name('homeclientall');
        Route::get('delete_homeclient/{id}', [HomepageController::class, 'delete_homeclient'])->name('delete_homeclient');

        Route::get('homeclient/{id}', [HomepageController::class,'homeclient'])->name('homeclient');
        Route::put('updatehomeclient', [HomepageController::class,'updatehomeclient'])->name('updatehomeclient');

        // Why Us
        Route::get('createhometesti', [HomepageController::class,'createhometesti'])->name('createhometesti');
        Route::post('inserthometesti', [HomepageController::class,'inserthometesti'])->name('inserthometesti');
        Route::get('hometestiall', [HomepageController::class,'hometestiall'])->name('hometestiall');
        Route::get('hometesti/{id}', [HomepageController::class,'hometesti'])->name('hometesti');
        Route::put('updatehometesti', [HomepageController::class,'updatehometesti'])->name('updatehometesti');
        Route::get('delete_hometesti/{id}', [HomepageController::class, 'delete_hometesti'])->name('delete_hometesti');

        // About us first section
        Route::get('aboutfirstcreate', [AboupageController::class,'aboutfirstcreate'])->name('aboutfirstcreate');
        Route::post('aboutfirstinsert', [AboupageController::class,'aboutfirstinsert'])->name('aboutfirstinsert');
        Route::get('aboutfirstall', [AboupageController::class,'aboutfirstall'])->name('aboutfirstall');
        Route::get('aboutfirstdetail/{id}', [AboupageController::class,'aboutfirstdetail'])->name('aboutfirstdetail');
        Route::put('aboutfirstupdate', [AboupageController::class,'aboutfirstupdate'])->name('aboutfirstupdate');
        Route::get('aboutfirstdelete/{id}', [AboupageController::class, 'aboutfirstdelete'])->name('aboutfirstdelete');

        // About us Our mission first section
        Route::get('missionfirstcreate', [AboupageController::class,'missionfirstcreate'])->name('missionfirstcreate');
        Route::post('missionfirstinsert', [AboupageController::class,'missionfirstinsert'])->name('missionfirstinsert');
        Route::get('missionfirstall', [AboupageController::class,'missionfirstall'])->name('missionfirstall');
        Route::get('missionfirstdetail/{id}', [AboupageController::class,'missionfirstdetail'])->name('missionfirstdetail');
        Route::put('missionfirstupdate', [AboupageController::class,'missionfirstupdate'])->name('missionfirstupdate');
        Route::get('missionfirstdelete/{id}', [AboupageController::class, 'missionfirstdelete'])->name('missionfirstdelete');

        // About us Our mission second section
        // Route::get('missionsecondcreate', [AboupageController::class,'missionsecondcreate'])->name('missionsecondcreate');
        // Route::post('missionsecondinsert', [AboupageController::class,'missionsecondinsert'])->name('missionsecondinsert');
        // Route::get('missionsecondall', [AboupageController::class,'missionsecondall'])->name('missionsecondall');
        // Route::get('missionseconddetail/{id}', [AboupageController::class,'missionseconddetail'])->name('missionseconddetail');
        // Route::put('missionsecondupdate', [AboupageController::class,'missionsecondupdate'])->name('missionsecondupdate');
        // Route::get('missionseconddelete/{id}', [AboupageController::class, 'missionseconddelete'])->name('missionseconddelete');

        // About us Our expert first section
        Route::get('expertfirstcreate', [AboupageController::class,'expertfirstcreate'])->name('expertfirstcreate');
        Route::post('expertfirstinsert', [AboupageController::class,'expertfirstinsert'])->name('expertfirstinsert');
        Route::get('expertfirstall', [AboupageController::class,'expertfirstall'])->name('expertfirstall');
        Route::get('expertfirstdetail/{id}', [AboupageController::class,'expertfirstdetail'])->name('expertfirstdetail');
        Route::put('expertfirstupdate', [AboupageController::class,'expertfirstupdate'])->name('expertfirstupdate');
        Route::get('expertfirstdelete/{id}', [AboupageController::class, 'expertfirstdelete'])->name('expertfirstdelete');

        // About us Our Team section
        Route::get('aboutteamcreate', [AboupageController::class,'aboutteamcreate'])->name('aboutteamcreate');
        Route::post('aboutteaminsert', [AboupageController::class,'aboutteaminsert'])->name('aboutteaminsert');
        Route::get('aboutteamall', [AboupageController::class,'aboutteamall'])->name('aboutteamall');
        Route::get('aboutteamdetail/{id}', [AboupageController::class,'aboutteamdetail'])->name('aboutteamdetail');
        Route::put('aboutteamupdate', [AboupageController::class,'aboutteamupdate'])->name('aboutteamupdate');
        Route::get('aboutteamdelete/{id}', [AboupageController::class, 'aboutteamdelete'])->name('aboutteamdelete');
        
        // About us Our expert second section
        // Route::get('expertsecondcreate', [AboupageController::class,'expertsecondcreate'])->name('expertsecondcreate');
        // Route::post('expertsecondinsert', [AboupageController::class,'expertsecondinsert'])->name('expertsecondinsert');
        // Route::get('expertsecondall', [AboupageController::class,'expertsecondall'])->name('expertsecondall');
        // Route::get('expertseconddetail/{id}', [AboupageController::class,'expertseconddetail'])->name('expertseconddetail');
        // Route::put('expertsecondupdate', [AboupageController::class,'expertsecondupdate'])->name('expertsecondupdate');
        // Route::get('expertseconddelete/{id}', [AboupageController::class, 'expertseconddelete'])->name('expertseconddelete');

        // Case Study first section
        Route::get('casefirstcreate', [CasestudyController::class,'casefirstcreate'])->name('casefirstcreate');
        Route::post('casefirstinsert', [CasestudyController::class,'casefirstinsert'])->name('casefirstinsert');
        Route::get('casefirstall', [CasestudyController::class,'casefirstall'])->name('casefirstall');
        Route::get('casefirstdetail/{id}', [CasestudyController::class,'casefirstdetail'])->name('casefirstdetail');
        Route::put('casefirstupdate', [CasestudyController::class,'casefirstupdate'])->name('casefirstupdate');
        Route::get('casefirstdelete/{id}', [CasestudyController::class, 'casefirstdelete'])->name('casefirstdelete');

        // Service Page
        Route::get('servicecreate', [ServiceController::class,'servicecreate'])->name('servicecreate');
        Route::post('serviceinsert', [ServiceController::class,'serviceinsert'])->name('serviceinsert');
        Route::get('serviceall', [ServiceController::class,'serviceall'])->name('serviceall');
        Route::get('servicedetail/{id}', [ServiceController::class,'servicedetail'])->name('servicedetail');
        Route::put('serviceupdate', [ServiceController::class,'serviceupdate'])->name('serviceupdate');
        Route::get('servicedelete/{id}', [ServiceController::class, 'servicedelete'])->name('servicedelete');

        // Service Detail Page
        Route::get('servicepagecreate/{service_id}', [ServiceController::class,'servicepagecreate'])->name('servicepagecreate');
        Route::post('servicepageinsert', [ServiceController::class,'servicepageinsert'])->name('servicepageinsert');
        Route::get('servicepageall/{service_id}', [ServiceController::class,'servicepageall'])->name('servicepageall');
        Route::get('servicepagedetail/{id}/{service_id}', [ServiceController::class,'servicepagedetail'])->name('servicepagedetail');
        Route::put('servicepageupdate', [ServiceController::class,'servicepageupdate'])->name('servicepageupdate');
        Route::get('servicepagedelete/{id}/{service_id}', [ServiceController::class, 'servicepagedelete'])->name('servicepagedelete');

        // industry Page
        Route::get('industrycreate', [IndustryController::class,'industrycreate'])->name('industrycreate');
        Route::post('industryinsert', [IndustryController::class,'industryinsert'])->name('industryinsert');
        Route::get('industryall', [IndustryController::class,'industryall'])->name('industryall');
        Route::get('industrydetail/{id}', [IndustryController::class,'industrydetail'])->name('industrydetail');
        Route::put('industryupdate', [IndustryController::class,'industryupdate'])->name('industryupdate');
        Route::get('industrydelete/{id}', [IndustryController::class, 'industrydelete'])->name('industrydelete');

        // industry Detail Page First Section
        Route::get('industryfirstcreate/{industry_id}', [IndustryController::class,'industryfirstcreate'])->name('industryfirstcreate');
        Route::post('industryfirstinsert', [IndustryController::class,'industryfirstinsert'])->name('industryfirstinsert');
        Route::get('industryfirstall/{industry_id}', [IndustryController::class,'industryfirstall'])->name('industryfirstall');
        Route::get('industryfirstdetail/{id}/{industry_id}', [IndustryController::class,'industryfirstdetail'])->name('industryfirstdetail');
        Route::put('industryfirstupdate', [IndustryController::class,'industryfirstupdate'])->name('industryfirstupdate');
        Route::get('industryfirstdelete/{id}/{industry_id}', [IndustryController::class, 'industryfirstdelete'])->name('industryfirstdelete');

        // industry Detail Page Second Section
        Route::get('industrysecondcreate/{industry_id}', [IndustryController::class,'industrysecondcreate'])->name('industrysecondcreate');
        Route::post('industrysecondinsert', [IndustryController::class,'industrysecondinsert'])->name('industrysecondinsert');
        Route::get('industrysecondall/{industry_id}', [IndustryController::class,'industrysecondall'])->name('industrysecondall');
        Route::get('industryseconddetail/{id}/{industry_id}', [IndustryController::class,'industryseconddetail'])->name('industryseconddetail');
        Route::put('industrysecondupdate', [IndustryController::class,'industrysecondupdate'])->name('industrysecondupdate');
        Route::get('industryseconddelete/{id}/{industry_id}', [IndustryController::class, 'industryseconddelete'])->name('industryseconddelete');

        // industry Detail Page third and fourth Section
        Route::get('industrypagecreate/{industry_id}', [IndustryController::class,'industrypagecreate'])->name('industrypagecreate');
        Route::post('industrypageinsert', [IndustryController::class,'industrypageinsert'])->name('industrypageinsert');
        Route::get('industrypageall/{industry_id}', [IndustryController::class,'industrypageall'])->name('industrypageall');
        Route::get('industrypagedetail/{id}/{industry_id}', [IndustryController::class,'industrypagedetail'])->name('industrypagedetail');
        Route::put('industrypageupdate', [IndustryController::class,'industrypageupdate'])->name('industrypageupdate');
        Route::get('industrypagedelete/{id}/{industry_id}', [IndustryController::class, 'industrypagedelete'])->name('industrypagedelete');





        // blogs 
        Route::get('createblogs', [HomeController::class,'createblogs'])->name('createblogs');
        Route::post('blog_store', [HomeController::class,'blog_store'])->name('blog_store');
        Route::get('allblogs', [HomeController::class,'allblogs'])->name('allblogs');
        Route::get('blog_detail/{id}', [HomeController::class,'blog_detail'])->name('blog_detail');
        Route::put('update_blog', [HomeController::class,'update_blog'])->name('update_blog');
        Route::get('delete_blog/{id}', [HomeController::class,'delete_blog'])->name('delete_blog');
        


        // careers
        Route::get('createcareer', [CareerController::class,'createcareer'])->name('createcareer');
        Route::post('career_store', [CareerController::class,'career_store'])->name('career_store');
        Route::get('allcareer', [CareerController::class,'allcareer'])->name('allcareer');
        Route::get('career_detail/{id}', [CareerController::class,'career_detail'])->name('career_detail');
        Route::put('update_career', [CareerController::class,'update_career'])->name('update_career');
        Route::get('delete_career/{id}', [CareerController::class,'delete_career'])->name('delete_career');
        Route::post('delete_skills', [CareerController::class,'delete_skills'])->name('delete_skills');
        Route::post('delete_roles', [CareerController::class,'delete_roles'])->name('delete_roles');

        // Career page first Section
        Route::get('careerfirstcreate', [CareerController::class,'careerfirstcreate'])->name('careerfirstcreate');
        Route::post('careerfirstinsert', [CareerController::class,'careerfirstinsert'])->name('careerfirstinsert');
        Route::get('careerfirstall', [CareerController::class,'careerfirstall'])->name('careerfirstall');
        Route::get('careerfirstdetail/{id}/', [CareerController::class,'careerfirstdetail'])->name('careerfirstdetail');
        Route::put('careerfirstupdate', [CareerController::class,'careerfirstupdate'])->name('careerfirstupdate');
        Route::get('careerfirstdelete/{id}', [CareerController::class, 'careerfirstdelete'])->name('careerfirstdelete');

        // Career page second Section
        Route::get('careersecondcreate', [CareerController::class,'careersecondcreate'])->name('careersecondcreate');
        Route::post('careersecondinsert', [CareerController::class,'careersecondinsert'])->name('careersecondinsert');
        Route::get('careersecondall', [CareerController::class,'careersecondall'])->name('careersecondall');
        Route::get('careerseconddetail/{id}', [CareerController::class,'careerseconddetail'])->name('careerseconddetail');
        Route::put('careersecondupdate', [CareerController::class,'careersecondupdate'])->name('careersecondupdate');
        Route::get('careerseconddelete/{id}', [CareerController::class, 'careerseconddelete'])->name('careerseconddelete');

        Route::get('allapplication', [CareerController::class,'allapplication'])->name('allapplication');
        Route::get('application_detail/{id}', [CareerController::class, 'application_detail'])->name('application_detail');
        
        Route::get('contactlist', [CareerController::class,'contactlist'])->name('contactlist');
        Route::get('contactlistdelete/{id}', [CareerController::class, 'contactlistdelete'])->name('contactlistdelete');

        
    });
    Route::post('logout', [AuthenticatedSessionController::class,'destroy'])->name('logout');
});