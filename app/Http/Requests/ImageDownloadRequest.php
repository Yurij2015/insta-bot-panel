<?php

namespace App\Http\Requests;

use App\Models\IgUser;
use App\Models\Profile;
use App\Models\ProfileInfo;
use App\Models\ProfileList;
use App\Models\SearchResult;
use Illuminate\Support\Facades\Storage;
use Log;

class ImageDownloadRequest
{
    public function downloadAndSaveImageForSearch(IgUser $user, $imageName): void
    {
        $searchResult = SearchResult::where('id', '=', $user->search_result_id)->first();
        $profile = Profile::where('username', '=', $searchResult?->ig_username)->with('proxy')->first();
        $profileInfo = ProfileInfo::where('inst_id', $user->pk)->first();
        if ($profileInfo) {
            $profilePicUrl = $profileInfo->profile_pic_url;
        } else {
            $profilePicUrl = $user->profile_pic_url;
        }
        if ($profile) {
            $this->downloadAndSaveImage($profile, $profilePicUrl, $imageName);
        }
    }

    public function downloadAndSaveImageForList(ProfileInfo $user, $imageName, ProfileList $profileList): void
    {
        $profile = Profile::where('id', '=', $profileList->ig_username)->with('proxy')->first();
        $profilePicUrl = $user->profile_pic_url;
        if ($profile) {
            $this->downloadAndSaveImage($profile, $profilePicUrl, $imageName);
        }
    }

    private function downloadAndSaveImage(Profile $profile, string $profilePicUrl, $imageName): void
    {
        $proxyHost = $profile->proxy->proxy;
        $proxyPort = $profile->proxy->port;
        $proxyAuth = ($profile->proxy->login) . ":" . ($profile->proxy->password);

        $context = stream_context_create([
            'http' => [
                'proxy' => "tcp://$proxyHost:$proxyPort",
                'request_fulluri' => true,
                'header' => "Proxy-Authorization: Basic " . base64_encode($proxyAuth),
            ],
        ]);

        try {
            $imageContent = file_get_contents($profilePicUrl, false, $context);
            $imagePath = 'profiles/images/' . $imageName;

            if (Storage::disk('public')->put($imagePath, $imageContent)) {
                Log::info("File saved at: " . Storage::disk('public')->url($imagePath));
            } else {
                Log::error("Failed to save the file. " . $imagePath);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
