<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Contactus;
use Carbon\Carbon;

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
        $data=Contactus::all();
        $created=$data->pluck('created_at');
        // dd($created);
        $currentTime = Carbon::now();
       
        // dd($currentTime);
        $endTime = $currentTime;
        $startTime = $created;
        $timeleft = $startTime->diffInSeconds($endTime);
        $_format = \Carbon\CarbonInterval::seconds($timeleft)->cascade()->forHumans();
        dd($_format);
       
        


    }
}
