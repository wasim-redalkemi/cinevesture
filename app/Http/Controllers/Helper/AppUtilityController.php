<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use App\Models\Otp;
use Carbon\Carbon;

class AppUtilityController extends Controller
{
    public static function getVideoDetailsById($url)
    {   
        if(empty($url)){
            throw new \Exception("Video url cannot be empty");
        }
        //\Log::info("getting video details for ".SELF::isValidYoutubeUrl($url)." id = ".SELF::parseYouTubeTokenByUri($url));
        $urlInfo = parse_url($url);
        $status = 1;
        if(SELF::isValidYoutubeUrl($url)) {
            $vidId = SELF::parseYouTubeTokenByUri($url);
            //\Log::info("youtube video id ".$vidId);
            // $apiKey = config('app.GOOGLE_API_KEY');
            // $filepath = "https://www.googleapis.com/youtube/v3/videos?id=".$vidId."&key=".$apiKey."&part=snippet";
            //echo $filepath;
            // Eg. https://www.googleapis.com/youtube/v3/videos?id=ZdbQ_FvNBZA&key=AIzaSyCNJqNKLKFTBoLnbrbNtP8MDlz2vBVvNnE&part=snippet
            // $json = file_get_contents($filepath);
            // sample response
            $json = '{"kind":"youtube#videoListResponse","etag":"NY12d6Sa3mhyYdxx62iuVh0ta50","items":[{"kind":"youtube#video","etag":"BlL66Tqwd6vcpb_0fuUt4YHRBlA","id":"ZdbQ_FvNBZA","snippet":{"publishedAt":"2021-10-03T07:14:26Z","channelId":"UCyzKMNskJwgVy7j_lQ5aP-Q","title":"Session 5: What is Postman? and How to use it? by Suprabhat Sen","description":"Postman is one of the most important tools for any kind of Web and App Development. Learn how Postman works and helps make the job easier for any Software Developer","thumbnails":{"default":{"url":"https://i.ytimg.com/vi/ZdbQ_FvNBZA/default.jpg","width":120,"height":90},"medium":{"url":"https://i.ytimg.com/vi/ZdbQ_FvNBZA/mqdefault.jpg","width":320,"height":180},"high":{"url":"https://i.ytimg.com/vi/ZdbQ_FvNBZA/hqdefault.jpg","width":480,"height":360},"standard":{"url":"https://i.ytimg.com/vi/ZdbQ_FvNBZA/sddefault.jpg","width":640,"height":480},"maxres":{"url":"https://i.ytimg.com/vi/ZdbQ_FvNBZA/maxresdefault.jpg","width":1280,"height":720}},"channelTitle":"ScaleupAlly","categoryId":"28","liveBroadcastContent":"none","localized":{"title":"Session 5: What is Postman? and How to use it? by Suprabhat Sen","description":"Postman is one of the most important tools for any kind of Web and App Development. Learn how Postman works and helps make the job easier for any Software Developer"}}}],"pageInfo":{"totalResults":1,"resultsPerPage":1}}';
            $data = json_decode($json, true);
            $data['src'] = 'youtube';
        } else if ($urlInfo['host'] == "vimeo.com" || $urlInfo['host'] == "www.vimeo.com"){
            $vidId = trim($urlInfo['path'],"/");
            // $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$vidId.php")); return serialized php object
    
            $hash = file_get_contents("http://vimeo.com/api/v2/video/$vidId.json");
            $json = $hash;//[0]['thumbnail_medium'];
            // sample 
            //$json = '[{"id":336812686,"title":"Direct Links To Video Files","description":"Hi there! Need help? Go to http:\/\/vimeo.com\/help","url":"https:\/\/vimeo.com\/336812686","upload_date":"2019-05-17 09:32:53","thumbnail_small":"https:\/\/i.vimeocdn.com\/video\/783757833-369ed61d5dd1e7a6a095543c901a1c4a656e6bc1e0471c1629d03f7fdd36d436-d_100x75","thumbnail_medium":"https:\/\/i.vimeocdn.com\/video\/783757833-369ed61d5dd1e7a6a095543c901a1c4a656e6bc1e0471c1629d03f7fdd36d436-d_200x150","thumbnail_large":"https:\/\/i.vimeocdn.com\/video\/783757833-369ed61d5dd1e7a6a095543c901a1c4a656e6bc1e0471c1629d03f7fdd36d436-d_640","user_id":90564994,"user_name":"Vimeo Support","user_url":"https:\/\/vimeo.com\/vimeosupport","user_portrait_small":"https:\/\/i.vimeocdn.com\/portrait\/27986607_30x30","user_portrait_medium":"https:\/\/i.vimeocdn.com\/portrait\/27986607_75x75","user_portrait_large":"https:\/\/i.vimeocdn.com\/portrait\/27986607_100x100","user_portrait_huge":"https:\/\/i.vimeocdn.com\/portrait\/27986607_300x300","duration":41,"width":1920,"height":1080,"tags":"","embed_privacy":"anywhere"}]';
            $data = json_decode($json, true);
            $data = $data[0];
            $data['src'] = "vimeo";
        } else {
            $status = 0;
            $data = [];
        }
        $toReturn = ['status'=>$status,'pl'=>$data];
        return $toReturn;
    }

    public static function isValidYoutubeUrl ($url) {
        $urlInfo = parse_url($url);
        $host = str_replace(".","",$urlInfo['host']);
        return (str_contains($host,"youtube")) ? true : false;
    }

    /**
     * Find YouTube token by real URI
     *
     * 1. User channel with URI prefix (no token)
     * 2. Exact match
     * 3. URI prefix + token
     * 4. Token + organic URL parameters
     * 5. User channel (no token)
     * 6. URL encoded like API
     * 7. Special cases
     *
     * @param string $url
     * @return string|null
     * @author Jan Barasek https://baraja.cz
     */

    public function parseYouTubeTokenByUri(string $url): ?string
    {
        if (strncmp($url, 'user/', 5) === 0) { // 1.
            return null;
        }

        if (preg_match('/^[a-zA-Z0-9\-\_]{11}$/', $url)) { // 2.
            return $url;
        }

        if (preg_match('/(?:watch\?v=|v\/|embed\/|ytscreeningroom\?v=|\?v=|\?vi=|e\/|watch\?.*vi?=|\?feature=[a-z_]*&v=|vi\/)([a-zA-Z0-9\-\_]{11})/', $url, $regularMatch)) { // 3.
            return $regularMatch[1];
        }

        if (preg_match('/([a-zA-Z0-9\-\_]{11})(?:\?[a-z]|\&[a-z])/', $url, $organicParametersMatch)) { // 4.
            return $organicParametersMatch[1];
        }

        if (preg_match('/u\/1\/([a-zA-Z0-9\-\_]{11})(?:\?rel=0)?$/', $url)) { // 5.
            return null; // 5. User channel without token.
        }

        if (preg_match('/(?:watch%3Fv%3D|watch\?v%3D)([a-zA-Z0-9\-\_]{11})[%&]/', $url, $urlEncoded)) { // 6.
            return $urlEncoded[1];
        }

        // 7. Rules for special cases
        if (preg_match('/watchv=([a-zA-Z0-9\-\_]{11})&list=/', $url, $special1)) {
            return $special1[1];
        }

        return null;
    }
}
