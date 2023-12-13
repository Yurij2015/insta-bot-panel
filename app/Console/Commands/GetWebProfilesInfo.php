<?php

namespace App\Console\Commands;

use App\Http\Requests\GetCurlRequests\WebProfileInfo;
use App\Models\GetFullIgUsersDataTask;
use App\Models\IgUser;
use App\Models\Profile;
use App\Models\SearchResult;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Log;

class GetWebProfilesInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get-web-profiles-info';

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
        $getFullIgUsersDataTasks = GetFullIgUsersDataTask::where('status', 'active')->get();
        foreach ($getFullIgUsersDataTasks as $task) {
            $taskStartedAt = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
            $profile = $this->getPersonalProfile($task);
            $igUsers = IgUser::where('search_result_id', $task->search_result_id)->get();
            $i = 0;
            foreach ($igUsers as $igUser) {
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
                        $webProfileInfo->getWebProfileInfo($profile, $igUser->username);
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

    private function getPersonalProfile(GetFullIgUsersDataTask $task): ?Profile
    {
        $searchResultId = $task->search_result_id;
        $searchResult = SearchResult::find($searchResultId);
        return Profile::where('username', $searchResult->ig_username)->first();
    }
}
