<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:generatedb {type=jsonfile : Type of input data}
    {filename=words.json : Path in storage/public for json input file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate DB of words for learning';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('This command may take a while :/');
        return Command::SUCCESS;
    }
}
