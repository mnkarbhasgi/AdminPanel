<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Contactus;
use Carbon\Carbon;
use DB;
use DateTime;


class DailyPriority extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'priority:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Priority is changed with the time';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //return 0;
        // $data = Contactus::where('id', 1)->get();
        // $fdate = $data->pluck('created_at')->format('Y-m-d H:s:i');
        // dd ($fdate);
        // $tdate = Carbon::now()->format('Y-m-d H:s:i');
        //dd($tdate);
       // $start_date = Carbon::parse($fdate)->format('Y-m-d H:s:i');
       // dd($start_date);
        //$end_date =  Carbon::parse($tdate)->format('Y-m-d H:s:i');

        // $different_days = $fdate->diffInDays($tdate);

        // dd($different_days);
///

$users =Contactus::select('contactuses.id')
                    ->where('status','=','new')
                   ->where('priority','=','low')
                  // ->where('created_at','<=','Carbon::now()')
                   ->whereDate('created_at', '<=', Carbon::today())
                  //->whereDate('created_at', '<=', Carbon::now()->toDateString())
                  ->get();
                  dd($users);
                 $diff = Carbon::parse($users[0]->created_at)->diffForHumans(Carbon::now());
                 //dd($diff);
                 if($diff < 1){
                        echo("low");
                 }elseif($diff == 1){
                      echo("medium");
                 }
                 elseif($diff == 2){
                    echo("high");
                 }
                 
               


    

                  
              
           
        //new
       
    }
}
