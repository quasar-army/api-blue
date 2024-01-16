<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class RecreateDatabaseProceduresCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:recreate-procedures';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recreate all sql procedures';

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
        foreach (glob(database_path('procedures') . '/*.sql') as $filePath) {
            $fileContent = file_get_contents($filePath);
            $fileName = array_slice(explode('/', $filePath), -1)[0];
            $this->line("running $fileName");
            DB::unprepared($fileContent);
            $this->info("success");
        }

        return 0;
    }
}
