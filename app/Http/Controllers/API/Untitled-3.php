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
        $data = Contactus::where('id',1)->get();
        $fdate = $data->pluck('created_at');
        // dd ($fdate);
        $tdate=Carbon::now(); 
        //dd($fdate);
        //1ST
        $answer_in_days = $tdate->diffInDays($fdate);
        // dd($answer_in_days);
         //2ND
        // $datetime1 = new DateTime($fdate);
        // $datetime2 = new DateTime($tdate);
        // $interval = $datetime1->diff($datetime2);
        // $days = $interval->format('%a'); 
        // dd($days);
        //3RD
        $from_date = Carbon::parse(date('Y-m-d', strtotime('2022-03-10'))); 
        $through_date = Carbon::parse(date('Y-m-d', strtotime('2022-03-12'))); 
            
        // get total number of minutes between from and throung date
        $shift_difference = $from_date->diffInDays($through_date);
        dd( $shift_difference);
        $fdate = Carbon::parse(date('Y-m-d', strtotime('2022-03-10'))); 
        dd($fdate);
        $through_date = Carbon::parse(date('Y-m-d', strtotime('2022-03-12'))); 
        //  $from_date = Carbon::parse(date('Y-m-d', strtotime('$fdate'))); 
        $shift_difference = $fdate->diffInDays($through_date);
        dd( $shift_difference);
        $from_date = Carbon::parse(date('Y-m-d H:i:s', strtotime( str_replace('/', '-', $fdate ) ) ) );
        dd($from_date);
        $through_date = Carbon::parse(date('Y-m-d', strtotime($tdate))); 
        //  dd($through_date);
        // // get total number of minutes between from and throung date
        $shift_difference = $from_date->diffInDays($through_date);
        dd( $shift_difference);

  
   // $actual_start_at = Carbon::parse('2022-06-28 13:00:00');
      $actual_start_at = Carbon::parse($fdate);
     // dd($actual_start_at);
    //$actual_start_at = Carbon::parse(date('Y-m-d', strtotime($cdate)));
       //dd($actual_start_at);
      $actual_end_at   =  Carbon::now();
      dd($actual_end_at);
      $ldate = new DateTime('now');
      //  dd($actual_end_at);
       $days = $actual_end_at->diffInDays($actual_start_at, true);

           dd($days);
        // $date = Carbon::parse(date('Y-m-d', strtotime($cdate)));
       //dd($date);
        //$date = Carbon::parse(date('Y-m-d', strtotime('sdate')));
        // $datework = Carbon::createFromDate($date);
        //dd($datework);
    //     $now = Carbon::now();
    //     $testdate = $datework->diffInHour($now);
    //    dd ($testdate);
        // dd(date("Y-m-d",$testdate));

//         $start = Carbon::parse($cdate);


// $current = Carbon::now();
// $length = $start->diffInDays($current);
// dd($length);
$created = new Carbon($data->created_at);
        dd($created);
        $now = Carbon::now();
        $difference = ($created->diff($now)->days < 1)
            ? 'low'
            : $created->diffForHumans($now);
        dd($difference);




    }
}
