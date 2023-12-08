<?php

namespace App\Console\Commands;

use App\Models\UserAgent;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class LoadUserAgents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load-user-agents {argument}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $name = $this->argument('argument');
        $fileName = "app/Console/Commands/userAgents/user-agents_" . $name . "_macos.txt";
        if (file_exists($fileName)) {
            $lines = file($fileName);
            foreach ($lines as $line) {
                UserAgent::updateOrCreate(
                    [
                        'user_agent' => $line,
                    ],
                    [
                        'name' => $name,
                        'user_agent' => $line,
                    ]
                );
            }
        } else {
            Log::error("The file does not exist.");
        }
    }
}
