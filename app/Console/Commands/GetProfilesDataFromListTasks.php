<?php

namespace App\Console\Commands;

use App\Http\Requests\GetCurlRequests\WebProfileInfo;
use App\Models\GetProfilesDataFromListTask;
use App\Models\Profile;
use App\Models\ProfileList;
use Carbon\Carbon;
use Exception;
use Illuminate\Console\Command;
use Log;

class GetProfilesDataFromListTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get-profiles-data-from-list-tasks';

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
        $getProfilesDataFromListTasks = GetProfilesDataFromListTask::where('status', 'active')->get();
        foreach ($getProfilesDataFromListTasks as $task) {
            $profilesList = explode(",", ProfileList::find($task->profile_list_id)->profiles_list);
            $taskStartedAt = Carbon::now()->format('Y-m-d H:i:s');
            $profile = $this->getPersonalProfile($task);
            $i = 0;
            foreach ($profilesList as $userName) {
                $rand_pause = random_int(200000, 300000);
                $rand_i = random_int(8, 16);
                $required_delay = random_int(14, 17);
                $remainder_from_division = random_int(1, 9);
                if ($i % $rand_i === $remainder_from_division || $i % $required_delay === 0) {
                    $rand_pause = random_int(5000000, 6000000);
                }
                usleep($rand_pause);
                try {
                    $task->task_status = 'running';
                    $task->save();
                    if ($profile) {
                        $webProfileInfo->getProfilesFromListInfo($profile, $userName, $task->profile_list_id);
                    }
                } catch (Exception $e) {
                    $task->task_status = 'error';
                    $task->save();
                    Log::error($e->getMessage());
                }
                $i++;
            }
            $taskStopedAt = Carbon::now()->format('Y-m-d H:i:s');
            $task->task_started_at = $taskStartedAt;
            $task->task_stoped_at = $taskStopedAt;
            $task->status = 'completed';
            $task->task_status = 'completed';
            $task->save();
        }
    }

    private function getPersonalProfile(GetProfilesDataFromListTask $task): ?Profile
    {
        return Profile::where('username', $task->personal_profile_to_work)->first();
    }
}
