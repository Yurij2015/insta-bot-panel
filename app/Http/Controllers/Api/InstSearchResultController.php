<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageDownloadRequest;
use App\Models\IgHashtag;
use App\Models\IgPlace;
use App\Models\IgUser;
use App\Models\SearchResult;
use Illuminate\Support\Facades\File;

class InstSearchResultController extends Controller
{
    public function index()
    {
        $searchResults = SearchResult::paginate(15);
        $searchResults->getCollection()->transform(function ($searchResult) {
            $searchResult->numberOfHashtags = $this->numberOfHashtags($searchResult);
            $searchResult->numberOfPlaces = $this->numberOfPlaces($searchResult);
            $searchResult->numberOfUsers = $this->numberOfUsers($searchResult);
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
        foreach ($users as $user) {
            $fileExist = File::exists(public_path("uploads/profiles/images/$user->username" . ".jpg"));
            if (!$fileExist) {
                $imgDownload->downloadAndSaveImage($user, $user->username . '.jpg');
            }
        }
        return view('inst-search-result.ig-users', compact('users'));
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
