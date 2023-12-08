<?php

namespace App\Console\Commands;

use App\Models\Proxy;
use Illuminate\Console\Command;
use JsonException;
use Log;

class UpdateProxyList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update-proxy-list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     * @throws JsonException
     */
    public function handle(): void
    {
        $ch = curl_init();
        $wabshareToken = 'ec39bx7ldl6my7gg1y2l2vqkc1ttu9q33ga8llmo';
        $url = 'https://proxy.webshare.io/api/v2/proxy/list/?mode=direct&page=1&page_size=25';
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        $headers = array();
        $headers[] = "Authorization: Token $wabshareToken";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            Log::error('Error:' . curl_error($ch));
        }
        curl_close($ch);
        $proxyList = json_decode($result, true, 512, JSON_THROW_ON_ERROR);
        $i = 1;
        foreach ($proxyList['results'] as $proxy) {
            Proxy::updateOrCreate(
                [
                    'id' => $i,
                ],
                [
                    'proxy' => $proxy['proxy_address'],
                    'port' => $proxy['port'],
                    'login' => $proxy['username'],
                    'password' => $proxy['password'],
                ]
            );
            $i++;
        }
    }
}
