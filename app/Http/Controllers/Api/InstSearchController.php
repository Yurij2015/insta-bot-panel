<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\IgSearchRepository;
use App\Http\Requests\PostCurlRequests\IgSearch;
use App\Models\Profile;
use App\Models\SearchResult;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use JsonException;

class InstSearchController extends Controller
{
    public function index()
    {
        $profiles = Profile::where('status', 'active_web')->get();
        $searchResult = SearchResult::paginate(20);
        return view('inst-search.index', compact('profiles', 'searchResult'));
    }

    /**
     * @throws JsonException
     */
    public function handleSearch(Request $request, IgSearch $igSearch, IgSearchRepository $repository): RedirectResponse
    {

        $key_word = $request->get('key_word');
        $profile_id = $request->get('profile_id');

        $search = $igSearch->search($key_word, $profile_id)->data->xdt_api__v1__fbsearch__topsearch_connection;
        $savedSearch = $repository->saveSearchResult($search, $profile_id, $key_word);

        $hashtags = $search->hashtags;
        $repository->saveHashtags($hashtags, $savedSearch->id);

        $places = $search->places;
        $repository->savePlaces($places, $savedSearch->id);

        $users = $search->users;
        $repository->saveUsers($users, $savedSearch->id);

        return redirect()->route('inst-search-result');
    }


}
