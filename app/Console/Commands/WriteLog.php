<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class WriteLog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'logger:info {message?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Write info messages in log file';

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
     * @return mixed
     */
    public function handle()
    {
        $this->info('start logging');
        $message = $this->argument('message');
        logger()->info($message);
        logger()->info("I'm harry");
        $this->info('end logging');
    }
}
