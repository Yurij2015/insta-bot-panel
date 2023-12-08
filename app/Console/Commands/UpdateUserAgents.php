<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateUserAgents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update-user-agents';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     * @throws \JsonException
     */
    public function handle(): void
    {
        $ch = curl_init();
        $whatismybrowserKey = '3b6f6288ca81141b4860376b4fd4a2db';
        $url = 'https://api.whatismybrowser.com/api/v2/software_version_numbers/all';
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        $headers = array();
        $headers[] = 'X-API-KEY: '.$whatismybrowserKey;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        $userAgents = json_decode($result, true, 512, JSON_THROW_ON_ERROR);
        dd($userAgents);
    }
}
