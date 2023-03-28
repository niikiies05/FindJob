<?php

namespace App\Console\Commands;

use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Console\Command;

class premiumStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'premium:switch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command allow to check the premium status of ads';

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
        $current_date = Carbon::now();
        $jobs = Job::all();
        foreach ($jobs as $job) {
            // $job->premium_delay;
            $start_date= Carbon::parse($current_date);
            $finish_date =Carbon::parse($job->premium_delay);
            $result= $start_date->diffInDays($finish_date, false);
            echo "espace ". $result;
            if ($result == 0) {
               $update= $job->update([
                    'premium' => 0,
                ]);
            }
            echo($update);
        }
        
    }
}
