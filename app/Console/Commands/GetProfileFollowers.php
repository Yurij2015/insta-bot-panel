<?php

namespace App\Console\Commands;

use App\Http\Controllers\OpenInBrowserGetProfileFollowersTaskController;
use App\Models\GetFollowersTask;
use App\Models\Profile;
use App\Models\ProfileInfo;
use Carbon\Carbon;
use Illuminate\Console\Command;
use JsonException;
use App\Http\Requests\GetCurlRequests\ProfileFollowers as ProfileFollowersRequest;
use Log;

class GetProfileFollowers extends Command
{
    private $openInBrowser;

    public function __construct(OpenInBrowserGetProfileFollowersTaskController $openInBrowser)
    {
        parent::__construct();
        $this->openInBrowser = $openInBrowser;
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get-profile-followers';

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
    public function handle(ProfileFollowersRequest $profileFollowers): void
    {
        $mainPause = static function () {
            return random_int(9000000, 15000000);
        };
        $getFollowersTask = GetFollowersTask::where('status', 'active')
            ->whereNotNull('search_result_id')->inRandomOrder()->get();
        foreach ($getFollowersTask as $task) {
            $taskStartedAt = Carbon::now()->format('Y-m-d H:i:s');
            $profileIdToGetFollowers = $this->getProfileToGetFollowers($task);
            $personalProfile = $this->getPersonalProfile($task);
            // TODO: add to settings (or work_akk from task or random)
            $randomPersonalProfile = Profile::with('proxy')
                ->where('status', 'active_web')
                ->inRandomOrder()->first();
            $profileUserNameToGetFollowers = ProfileInfo::where('inst_id', $profileIdToGetFollowers)->first()->username;
            $this->info(json_encode([
                'profileUserNameToGetFollowers' => $profileUserNameToGetFollowers,
                'randomPersonalProfile' => $randomPersonalProfile?->username
            ], JSON_THROW_ON_ERROR));
            Log::info(json_encode([
                'profileUserNameToGetFollowers' => $profileUserNameToGetFollowers,
                'randomPersonalProfile' => $randomPersonalProfile?->username
            ], JSON_THROW_ON_ERROR));
            $this->openInBrowser->__invoke($randomPersonalProfile, $profileUserNameToGetFollowers);
            $profileFollowers->getProfileFollowers($profileIdToGetFollowers, $task, $personalProfile);
            $taskStopedAt = Carbon::now()->format('Y-m-d H:i:s');
            $task->task_started_at = $taskStartedAt;
            $task->task_stoped_at = $taskStopedAt;
            $task->status = 'completed';
            $task->task_status = 'completed';
            $task->save();
            $cyclePause = $mainPause();
            Log::info("Main pause activated - " . $cyclePause);
            $this->info("Main pause activated - " . $cyclePause);
            usleep($cyclePause);
        }
    }

    private function getPersonalProfile(GetFollowersTask $task): ?Profile
    {
        return Profile::where('username', $task->personal_profile_username)->first();
    }

    private function getProfileToGetFollowers(GetFollowersTask $task): int
    {
        return $task->profile_id;
    }
}
