<?php

namespace App\Console\Commands;

use App\Http\Requests\GetCurlRequests\WebProfileInfo;
use App\Models\Profile;
use App\Models\ProfileFollowers;
use App\Models\ProfileFollowersWebProfileInfo;
use App\Models\Settings;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Log;

class GetProfileFollowersWebProfilesInfo extends Command
{
    public const ACTIVE = 1;
    public const INACTIVE = 0;

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

    public function handle(WebProfileInfo $webProfileInfo): void
    {
        $settings = Settings::where('settings_status', self::ACTIVE)->first();

        if ($settings && $settings->settings_status === self::INACTIVE) {
            $this->info("Settings is not active");
            Log::info("Settings is not active");
            return;
        }

        if ($settings && (int)$settings->task_status === self::INACTIVE) {
            $settings->current_task = 'parsing-profile-followers-web-profiles-info';
            $settings->task_status = self::ACTIVE;
            $settings->save();
            $countOfCycles = random_int($settings->lower_limit_parsed_accs_for_profile, $settings->upper_limit_parsed_accs_for_profile);
            $this->info("Count of cycles - " . $countOfCycles);
            Log::info("Count of cycles - " . $countOfCycles);
            $mainPause = static function () use ($settings) {
                return random_int($settings->lower_limit_profile_activity, $settings->upper_limit_profile_activity);
            };
            for ($i = 0; $i < $countOfCycles; $i++) {
                $randomPersonalProfile = $this->getPersonalProfile($settings->profiles_for_work);
                if ($randomPersonalProfile) {
                    $settings->current_profile = $randomPersonalProfile->username;
                    $settings->save();
                    $savedFollowersInfos = ProfileFollowersWebProfileInfo::get()->pluck('username');
                    $this->processingReceiveAndStoreFollowersData($savedFollowersInfos, $randomPersonalProfile, $settings, $webProfileInfo);
                    $cyclePause = $mainPause();
                    Log::info("Main pause activated - " . $cyclePause);
                    $this->info("Main pause activated - " . $cyclePause);
                    usleep($cyclePause);
                }
            }
        }
        if ($settings && (int)$settings->task_status === self::ACTIVE) {
            $this->info("Task $settings->current_task - already stopped");
            Log::info("Task $settings->current_task - already stopped");
            $settings->current_task = 'no active task';
            $settings->task_status = self::INACTIVE;
            $settings->save();
        }
    }

    /**
     * @param array $profilesForWork
     * @return Profile|null
     */
    private function getPersonalProfile(array $profilesForWork): ?Profile
    {
        return Profile::with('proxy')->whereIn('username', $profilesForWork)->inRandomOrder()->first();
    }

    private function processingReceiveAndStoreFollowersData(Collection $savedFollowersInfos, Profile $randomPersonalProfile, Settings $settings, WebProfileInfo $webProfileInfo): void
    {
        $followers = ProfileFollowers::where('full_name', 'REGEXP', '^[a-zA-Z\s]+$')
            ->whereNotIn('username', $savedFollowersInfos)
            ->inRandomOrder()
            ->limit(random_int($settings->lower_limit_parsed_accs_for_profile, $settings->upper_limit_parsed_accs_for_profile))
            ->pluck('username');
        $this->info("Task $settings->current_task - already running. Account - $randomPersonalProfile->username");
        Log::info("Task $settings->current_task - already running. Account - $randomPersonalProfile->username");
        foreach ($followers as $follower) {
            $rand_pause = random_int($settings->lower_limit_profile_activity, $settings->upper_limit_profile_activity);
            try {
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
    }
}
