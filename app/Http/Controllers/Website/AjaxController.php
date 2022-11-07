<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Controllers\WebController;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Helper\AppUtilityController;


class AjaxController extends WebController {
    
    public function getVideoDetails(Request $request){
        \Log::info("here in logs");
        $reqData = $request->all();
        try {
            if(isset($reqData['vidUrl'])){
                $apiKey = config('app.GOOGLE_API_KEY');
                //echo "apiKey ".$apiKey.", ".config('app.name');
                //https://www.googleapis.com/youtube/v3/videos?id=ZdbQ_FvNBZA&key=AIzaSyCNJqNKLKFTBoLnbrbNtP8MDlz2vBVvNnE&part=snippet
                // $json = '{"kind":"youtube#videoListResponse","etag":"NY12d6Sa3mhyYdxx62iuVh0ta50","items":[{"kind":"youtube#video","etag":"BlL66Tqwd6vcpb_0fuUt4YHRBlA","id":"ZdbQ_FvNBZA","snippet":{"publishedAt":"2021-10-03T07:14:26Z","channelId":"UCyzKMNskJwgVy7j_lQ5aP-Q","title":"Session 5: What is Postman? and How to use it? by Suprabhat Sen","description":"Postman is one of the most important tools for any kind of Web and App Development. Learn how Postman works and helps make the job easier for any Software Developer","thumbnails":{"default":{"url":"https://i.ytimg.com/vi/ZdbQ_FvNBZA/default.jpg","width":120,"height":90},"medium":{"url":"https://i.ytimg.com/vi/ZdbQ_FvNBZA/mqdefault.jpg","width":320,"height":180},"high":{"url":"https://i.ytimg.com/vi/ZdbQ_FvNBZA/hqdefault.jpg","width":480,"height":360},"standard":{"url":"https://i.ytimg.com/vi/ZdbQ_FvNBZA/sddefault.jpg","width":640,"height":480},"maxres":{"url":"https://i.ytimg.com/vi/ZdbQ_FvNBZA/maxresdefault.jpg","width":1280,"height":720}},"channelTitle":"ScaleupAlly","categoryId":"28","liveBroadcastContent":"none","localized":{"title":"Session 5: What is Postman? and How to use it? by Suprabhat Sen","description":"Postman is one of the most important tools for any kind of Web and App Development. Learn how Postman works and helps make the job easier for any Software Developer"}}}],"pageInfo":{"totalResults":1,"resultsPerPage":1}}';
                // echo $json;
                echo AppUtilityController::getVideoDetailsById($reqData['vidUrl']);
            } else {
                echo json_encode(["status"=>1,"error"=>"Invalid request"]);
            }
        } catch (Exception $e) {
            echo json_encode(["status"=>1,"error"=>$e->getMessage()]);
        }
        return;
    }

}
?>