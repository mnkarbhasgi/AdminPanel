<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Contactus;
use Carbon\Carbon;
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
        $data = Contactus::all();
       // dd($data);
        $cdate = $data->pluck('created_at');
        //$cdate->toDateTimeString();
       // dd($cdate);
   
   
      //  $tdate = $request->Tdate;
        // $datetime1 = new DateTime($fdate);
        // $datetime2 = new DateTime($tdate);
        // $interval = $datetime1->diff($datetime2);
        // $days = $interval->format('%a'); 
        // dd($days);
        // $from_date = Carbon::parse(date('Y-m-d', strtotime('2022-03-10'))); 
        // $through_date = Carbon::parse(date('Y-m-d', strtotime('2022-03-12'))); 
            
        // // get total number of minutes between from and throung date
        // $shift_difference = $from_date->diffInDays($through_date);
        // dd( $shift_difference);
        $date = Carbon::parse(date('Y-m-d', strtotime('2022-03-10')));
        //$date = Carbon::parse(date('Y-m-d', strtotime('sdate')));
        $datework = Carbon::createFromDate($date);
        $now = Carbon::now();
        $testdate = $datework->diffInDays($now);
        dd($testdate);





    }
}
