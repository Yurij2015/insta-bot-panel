<?php

namespace App\Http\Controllers\Desktop\IgTasks;

use App\Http\Controllers\Controller;
use App\Http\Requests\WalkingTaskSaveRequest;
use App\Models\Desktop\WalkingTask;
use App\Models\Profile;
use App\Models\ProfileFollowersWebProfileInfo;
use Illuminate\Http\Request;

class WalkingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $walking_tasks = WalkingTask::with('profile')->paginate(20);
        return view('desktop.ig.tasks.walking.index', compact('walking_tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $noCyrillic = (bool)$request->query('no_cyrillic');
        $businessProfiles = (bool)$request->query('business_profiles');
        $professionalProfiles = (bool)$request->query('professional_profiles');
        $privateProfiles = (bool)$request->query('private_profiles');
        $count = (int)$request->query('count_of_profiles', 10);
        $profiles = ProfileFollowersWebProfileInfo::inRandomOrder();
        if ($noCyrillic) {
            $profiles->where('biography', 'NOT REGEXP', '[\x{0400}-\x{04FF}]');
        }
        if ($businessProfiles) {
            $profiles->where('is_business_account', true);
        }
        if ($professionalProfiles) {
            $profiles->where('is_professional_account', true);
        }
        if ($privateProfiles) {
            $profiles->where('is_private', true);
        }
        $profiles = $profiles->limit($count)->pluck('username');

        $working_profiles = Profile::where('status', 'active_web')->get();


        return view('desktop.ig.tasks.walking.create', compact('profiles', 'working_profiles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WalkingTaskSaveRequest $request)
    {
        WalkingTask::create($request->validated());
        return redirect()->route('walking-tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
