<?php

namespace App\Console\Commands;

use App\Models\GetFollowersTask;
use App\Models\Profile;
use Carbon\Carbon;
use Illuminate\Console\Command;
use JsonException;
use App\Http\Requests\GetCurlRequests\ProfileFollowers as ProfileFollowersRequest;

class GetProfileFollowers extends Command
{
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
        $getFollowersTask = GetFollowersTask::where('status', 'active')->get();
        foreach ($getFollowersTask as $task) {
            $taskStartedAt = Carbon::now()->format('Y-m-d H:i:s');
            $profileIdToGetFollowers = $this->getProfileToGetFollowers($task);
            $personalProfile = $this->getPersonalProfile($task);
            $profileFollowers->getProfileFollowers($profileIdToGetFollowers, $task, $personalProfile);
            $taskStopedAt = Carbon::now()->format('Y-m-d H:i:s');
            $task->task_started_at = $taskStartedAt;
            $task->task_stoped_at = $taskStopedAt;
            $task->status = 'completed';
            $task->task_status = 'completed';
            $task->save();
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
