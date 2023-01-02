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

$users =Contactus::where('status','!=','replied' )->where('status','!=','solved')->where('status','!=','Replied')
                ->where('status','!=','Solved')->where('status','!=','REPLIED')->where('status','!=','SOLVED')
                ->where('status','!=','replied/solved')
                //    ->where('priority','=','low')
                 //  ->whereDate('created_at', '<=', Carbon::today())
                  ->get();
                 // dd($users);
                  $count= count($users);
                 // dd($count);
                 for($i=0; $i<$count;$i++ ){
                  //  echo $i;
                    // $diff = Carbon::parse($users[$i]->created_at)->diffInDays(Carbon::now());
                    // $id=$users[$i]->id;
                    //echo $id;
                    //echo $diff;
                    $diff = Carbon::parse($users[$i]->created_at)->diffInDays(Carbon::now());
                    $id=$users[$i]->id;
          
                    if($diff < 1){
                       $priority = Contactus::where('id',$id)->update(['priority'=>'low']);
        
                    }
                    
                    elseif($diff == 1 ){
                       $priority = Contactus::where('id',$id)->update(['priority' => 'medium']);
            
                    }
                    elseif($diff == 2  ||  $diff >= 2){
                       $priority = Contactus::where('id',$id)->update(['priority' => 'high']);
            
                    }
                  
                    

                 }
              
                
               


    

                  
              
           
        //new
       
    }
}
