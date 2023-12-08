<?php

namespace App\Console\Commands;

use App\Http\Requests\GetCurlRequests\WebProfileInfo;
use App\Models\IgUser;
use App\Models\Profile;
use Exception;
use Illuminate\Console\Command;
use Log;

class GetWebProfilesInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get-web-profiles-info {search_result_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     * @throws Exception
     */
    public function handle(WebProfileInfo $webProfileInfo): void
    {
        $search_result_id = $this->argument('search_result_id'); // last 13
        $igUsers = IgUser::where('search_result_id', $search_result_id)->get();
        $i = 0;
        foreach ($igUsers as $igUser) {
            $profile = Profile::with('proxy')->where('status', 'active')->inRandomOrder()->first();
            $rand_pause = random_int(200000, 300000);
            $rand_i = random_int(8, 16);
            $required_delay = random_int(14, 17);
            $remainder_from_division = random_int(1, 9);
            if ($i % $rand_i === $remainder_from_division || $i % $required_delay === 0) {
                $rand_pause = random_int(5000000, 6000000);
            }
            usleep($rand_pause);
            try {
                $webProfileInfo->getWebProfileInfo($profile, $igUser->username);
            } catch (Exception $e) {
                Log::error($e->getMessage());
            }
            $i++;
        }
    }
}
