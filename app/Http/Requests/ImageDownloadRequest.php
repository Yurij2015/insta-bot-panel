<?php

namespace App\Http\Requests;

use App\Models\IgUser;
use App\Models\Profile;
use App\Models\SearchResult;
use Illuminate\Support\Facades\Storage;
use Log;

class ImageDownloadRequest
{
    public function downloadAndSaveImage(IgUser $user, $imageName): void
    {
        $searchResult = SearchResult::where('id', '=', $user->search_result_id)->first();
        $profile = Profile::where('username', '=', $searchResult?->ig_username)->with('proxy')->first();

        $proxyHost = $profile?->proxy->proxy;
        $proxyPort = $profile?->proxy->port;
        $proxyAuth = ($profile?->proxy->login) . ":" . ($profile?->proxy->password);

        $context = stream_context_create([
            'http' => [
                'proxy' => "tcp://$proxyHost:$proxyPort",
                'request_fulluri' => true,
                'header' => "Proxy-Authorization: Basic " . base64_encode($proxyAuth),
            ],
        ]);

        try {
            $imageContent = file_get_contents($user->profile_pic_url, false, $context);
            Storage::disk('public')->put('profiles/images' . '/' . $imageName, $imageContent);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
