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
        $profiles = Profile::all();
        $searchResult = SearchResult::paginate(10);
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
        $repository->saveSearchResult($search, $profile_id, $key_word);

        $hashtags = $search->hashtags;
        $repository->saveHashtags($hashtags);

        $places = $search->places;
        $repository->savePlaces($places);

        $users = $search->users;
        $repository->saveUsers($users);

        return redirect()->route('inst-search');
    }


}
