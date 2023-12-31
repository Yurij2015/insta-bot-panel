<?php

namespace App\Console\Commands;

use App\Http\Requests\GetCurlRequests\WebProfileInfo;
use App\Models\Profile;
use App\Models\ProfileFollowers;
use App\Models\ProfileFollowersWebProfileInfo;
use Exception;
use Illuminate\Console\Command;
use JsonException;
use Log;

class GetProfileFollowersWebProfilesInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get-profile-followers-web-profiles-info';

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
    public function handle(WebProfileInfo $webProfileInfo): void
    {
        $countOfCycles = random_int(6, 12);
        $this->info("Count of cycles - " . $countOfCycles);
        $mainPause = static function () {
            return random_int(9000000, 15000000);
        };
        for ($i = 0; $i < $countOfCycles; $i++) {
            // TODO set working profiles from settings
            $randomPersonalProfile = Profile::with('proxy')
                ->whereIn('username', [
                    'kenda__lubowitz',
                    'fae__tromp',
                    'ursul_heller',
                    'heav__windler',
                    '_nik_prog_dev_'
                ])
                ->inRandomOrder()->first();
            $savedFollowersInfos = ProfileFollowersWebProfileInfo::get()->pluck('username');

            $followers = ProfileFollowers::where('full_name', 'REGEXP', '^[a-zA-Z\s]+$')->whereNotIn('username', $savedFollowersInfos)->inRandomOrder()->limit(random_int(7, 11))->pluck('username');
            foreach ($followers as $follower) {
                $rand_pause = random_int(9000000, 15000000);
                try{
                    $webProfileInfo->getProfileFollowersWebProfileInfo($randomPersonalProfile, $follower);
                } catch (Exception $e) {
                    Log::info($e->getMessage());
                    $this->info($e->getMessage());
                }
                Log::info('Personal profile ' . $randomPersonalProfile?->username . ' got info for ' . $follower);
                Log::info("Followers pause activated - " . $rand_pause);
                $this->info('Personal profile ' . $randomPersonalProfile?->username . ' got info for ' . $follower);
                $this->info("Followers pause activated - " . $rand_pause);
                usleep($rand_pause);
            }
            $cyclePause = $mainPause();
            Log::info("Main pause activated - " . $cyclePause);
            $this->info("Main pause activated - " . $cyclePause);
            usleep($cyclePause);
        }
    }
}
