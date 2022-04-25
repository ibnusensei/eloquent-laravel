<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class LogCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Daily Log';

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
        // random 2 user
        $users = User::inRandomOrder()->take(2)->get();
        $users->each(function ($user) {
            $user->createDailyLog();
        });
    }
}
