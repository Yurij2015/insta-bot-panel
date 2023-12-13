<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageDownloadRequest;
use App\Models\GetFollowersTask;
use App\Models\GetFullIgUsersDataTask;
use App\Models\IgHashtag;
use App\Models\IgPlace;
use App\Models\IgUser;
use App\Models\SearchResult;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Log;

class InstSearchResultController extends Controller
{
    public function index()
    {
        $searchResults = SearchResult::paginate(15);
        $searchResults->getCollection()->transform(function ($searchResult) {
            $searchResult->numberOfHashtags = $this->numberOfHashtags($searchResult);
            $searchResult->numberOfPlaces = $this->numberOfPlaces($searchResult);
            $searchResult->numberOfUsers = $this->numberOfUsers($searchResult);
            $searchResult->fullIgUsersDataTaskCreated = GetFullIgUsersDataTask::where('search_result_id', $searchResult->id)->first();
            return $searchResult;
        });
        return view('inst-search-result.index', compact('searchResults'));
    }

    public function igHashtags(SearchResult $searchResult)
    {
        $hashtags = IgHashtag::where('search_result_id', $searchResult->id)->paginate(15);
        return view('inst-search-result.ig-hashtags', compact('hashtags'));
    }

    public function igPlaces(SearchResult $searchResult)
    {
        $places = IgPlace::where('search_result_id', $searchResult->id)->paginate(15);
        return view('inst-search-result.ig-places', compact('places'));
    }

    public function igUsers(SearchResult $searchResult, ImageDownloadRequest $imgDownload)
    {
        $users = IgUser::with('profileInfo')->where('search_result_id', $searchResult->id)->paginate(15);

        $users->getCollection()->transform(function ($user) use ($searchResult, $imgDownload) {
            $fileExist = File::exists(public_path("uploads/profiles/images/$user->username" . ".jpg"));
            if (!$fileExist) {
                $imgDownload->downloadAndSaveImage($user, $user->username . '.jpg');
            }
            $user->isGetFollowersTaskCreated = GetFollowersTask::where('profile_id', $user->pk)->first();
            return $user;
        });

        $isFullIgUsersDataTaskCreated = GetFullIgUsersDataTask::where('search_result_id', $searchResult->id)->first();
        return view('inst-search-result.ig-users', compact('users', 'searchResult', 'isFullIgUsersDataTaskCreated'));
    }

    public function setGetFullDataTask(SearchResult $searchResult): RedirectResponse
    {
        $getProfileFollowersTaskCount = GetFullIgUsersDataTask::where('search_result_id', $searchResult->id)->count();
        if ($getProfileFollowersTaskCount > 0) {
            Log::info('GetFullIgUsersTask already exists for this search - ' . $searchResult->id);
        }

        $status = 'active';
        $taskStatus = 'waiting';
        GetFullIgUsersDataTask::updateOrCreate(
            [
                'search_result_id' => $searchResult->id,
            ],
            [
                'search_result_id' => $searchResult->id,
                'status' => $status,
                'task_status' => $taskStatus,
            ]);
        return redirect()->route('ig-users', ['searchResult' => $searchResult->id]);
    }

    private function numberOfHashtags(SearchResult $searchResult): int
    {
        return IgHashtag::where('search_result_id', $searchResult->id)->count();
    }

    private function numberOfPlaces(SearchResult $searchResult): int
    {
        return IgPlace::where('search_result_id', $searchResult->id)->count();
    }

    private function numberOfUsers(SearchResult $searchResult): int
    {
        return IgUser::where('search_result_id', $searchResult->id)->count();
    }
}
