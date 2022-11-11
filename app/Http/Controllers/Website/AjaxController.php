<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Controllers\WebController;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Helper\AppUtilityController;
use App\Models\ProjectMedia;


class AjaxController extends WebController {

    public function getVideoDetails(Request $request){
        //\Log::info("here in logs");
        $reqData = $request->all();
        $toReturn = "";
        try {
            if(isset($reqData['vidUrl'])){
                $toReturn = AppUtilityController::getVideoDetailsById($reqData['vidUrl']);
            } else {
                $toReturn = json_encode(["status"=>1,"error"=>"Invalid request"]);
            }
        } catch (Exception $e) {
            $toReturn = json_encode(["status"=>1,"error"=>$e->getMessage()]);
        }
        return $toReturn;
    }

    public function addVideo(Request $request){
        //\Log::info("here in logs");
        $reqData = $request->all();
        $ProjectMediaObj = new ProjectMedia();
        $ProjectMediaObj->project_id = $reqData['project_id'];
        $ProjectMediaObj->file_type = 'video';
        $ProjectMediaObj->file_link = $reqData['url'];
        $ProjectMediaObj->is_default_marked = $reqData['is_default_marked'];
        $ProjectMediaObj->media_info = json_encode(["thumbnail"=>$reqData['thumbnail'],'title'=>$reqData['title']]);
        $ProjectMediaObj->save();
        $ProjectMediaObj->media_info = json_decode($ProjectMediaObj->media_info, true);
        // $ProjectMediaObj = '{"project_id":"1","file_type":"video","file_link":"https:\/\/vimeo.com\/336812686","is_default_marked":"0","media_info":"{\"thumbnail\":\"https:\\\/\\\/i.vimeocdn.com\\\/video\\\/783757833-369ed61d5dd1e7a6a095543c901a1c4a656e6bc1e0471c1629d03f7fdd36d436-d_200x150\",\"title\":\"Direct Links To Video Files\"}","updated_at":"2022-11-07T06:54:01.000000Z","created_at":"2022-11-07T06:54:01.000000Z","id":1}';
        // $ProjectMediaObj = json_decode($ProjectMediaObj);
        // $ProjectMediaObj->media_info = json_decode($ProjectMediaObj->media_info, true);
        return json_encode($ProjectMediaObj);
    }

    public function getMedia(Request $request, $media_id) {
        $where = ['id' => $media_id];
        $ProjectMediaObj = ProjectMedia::find($media_id);
        $ProjectMediaObj->media_info = json_decode($ProjectMediaObj->media_info, true);
        return json_encode($ProjectMediaObj);
    }


    public function updateMedia(Request $request, $media_id){
        //\Log::info("here in logs");
        $reqData = $request->all();
        $ProjectMediaObj = ProjectMedia::find($media_id);
        //set all to "not featured"
        ProjectMedia::where(['project_id'=>$ProjectMediaObj->project_id,'file_type'=>'video'])->update(['is_default_marked'=> '0']);
        //
        $ProjectMediaObj->is_default_marked = $reqData['is_default_marked'];
        $ProjectMediaObj->save();
        $ProjectMediaObj->media_info = json_decode($ProjectMediaObj->media_info, true);
        return json_encode($ProjectMediaObj);
    }

    public function deleteMedia(Request $request, $media_id = null){
        \Log::info("here in logs ".$media_id);
        $reqData = $request->all();
        $ProjectMediaObj = ProjectMedia::find($media_id)->delete();
        //$ProjectMediaObj->media_info = json_decode($ProjectMediaObj->media_info, true);
        return json_encode($ProjectMediaObj);
    }

}
?>