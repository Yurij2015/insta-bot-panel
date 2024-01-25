<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingsSaveRequest;
use App\Models\Profile;
use App\Models\Settings;
use Illuminate\Http\RedirectResponse;

class SettingsController extends Controller
{
    public function index()
    {
        $profiles = Profile::get()->where('status', 'active_web');
        $settingsList = Settings::paginate(15);
        return view('settings.index', compact('profiles', 'settingsList'));
    }

    public function create()
    {
        $profiles = Profile::get()->where('status', 'active_web');
        return view('settings.create', compact('profiles'));
    }

    public function store(SettingsSaveRequest $saveRequest, Settings $settings): RedirectResponse
    {
        $validated = $saveRequest->validated();
        $settings->fill($validated);
        $settings->save();
        return redirect()->route('settings-index');
    }

    public function edit(Settings $settinsItem)
    {
        $profiles = Profile::get()->where('status', 'active_web');
        return view('settings.edit', compact('settinsItem', 'profiles'));
    }

    public function update(SettingsSaveRequest $saveRequest, Settings $settingsItem): RedirectResponse
    {
        $validated = $saveRequest->validated();
        $settingsItem->update($validated);
        return redirect()->route('settings-index');
    }

}
