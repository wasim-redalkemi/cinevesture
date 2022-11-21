<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Controllers\WebController;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Helper\AppUtilityController;
use App\Models\ProjectMedia;


class AjaxController extends WebController {
    CONST AJAX_CALL_SUCCESS = 1;
    CONST AJAX_CALL_ERROR = 0;

    public function getVideoDetails(Request $request){
        //\Log::info("here in logs");
        $reqData = $request->all();
        $toReturn = "";
        try {
            if(isset($reqData['vidUrl'])){
                $sourceResp = AppUtilityController::getVideoDetailsById($reqData['vidUrl']);
                if($sourceResp['status'] == 1){
                    $toReturn = $this->prepareJsonResp(AjaxController::AJAX_CALL_SUCCESS,$sourceResp['pl'],"Success","ER000","");
                } else {
                    $toReturn = $this->prepareJsonResp(AjaxController::AJAX_CALL_ERROR,[],"Failure","ER401","Invalid video url. Only Vimeo and Youtube links are allowed.");
                }
            } else {
                $toReturn = $this->prepareJsonResp(AjaxController::AJAX_CALL_ERROR,[],"Failure","ER501","Invalid request. Video URL is missing.");
            }
        } catch (Exception $e) {
            $toReturn = $this->prepareJsonResp(AjaxController::AJAX_CALL_ERROR,[],"Failure","ER500",$e->getMessage());
        }
        return $toReturn;
    }

    public function addVideo(Request $request){
        //\Log::info("here in logs");
        try {
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
            //return json_encode($ProjectMediaObj);
            return $this->prepareJsonResp(AjaxController::AJAX_CALL_SUCCESS,$ProjectMediaObj,"Success","ER000","");
        } catch (Exception $e) {
            return $this->prepareJsonResp(AjaxController::AJAX_CALL_ERROR,[],"Failure","ER500",$e->getMessage());
        }
    }

    public function getMedia(Request $request, $media_id) {
        try {
            $where = ['id' => $media_id];
            $ProjectMediaObj = ProjectMedia::find($media_id);
            if (isset($ProjectMediaObj)) {
                $ProjectMediaObj->media_info = json_decode($ProjectMediaObj->media_info, true);
                return $this->prepareJsonResp(AjaxController::AJAX_CALL_SUCCESS,$ProjectMediaObj,"Success","ER000","");
            } else {
                // return back()->with('error','Not find media file.');
                return $this->prepareJsonResp(AjaxController::AJAX_CALL_ERROR,[],"Failure","ER401","Resource could not be found.");
            }
            
        } catch (Exception $e) {
            // return back()->with('error','Something went wrong.');
            return $this->prepareJsonResp(AjaxController::AJAX_CALL_ERROR,[],"Failure","ER500",$e->getMessage());
        }
    }


    public function updateMedia(Request $request, $media_id){
        try {
            $reqData = $request->all();
            $ProjectMediaObj = ProjectMedia::find($media_id);
            if($ProjectMediaObj){
                //set all to "not featured"
                ProjectMedia::where(['project_id'=>$ProjectMediaObj->project_id,'file_type'=>$ProjectMediaObj->file_type])->update(['is_default_marked'=> '0']);
                $ProjectMediaObj->is_default_marked = $reqData['is_default_marked'];
                $ProjectMediaObj->save();
                $ProjectMediaObj->media_info = json_decode($ProjectMediaObj->media_info, true);
                return $this->prepareJsonResp(AjaxController::AJAX_CALL_SUCCESS,$ProjectMediaObj,"Success","ER000","");
            } else {
                return $this->prepareJsonResp(AjaxController::AJAX_CALL_ERROR,[],"Failure","ER401","Could not find the resource.");
            }
        } catch (Exception $e) {
            return $this->prepareJsonResp(AjaxController::AJAX_CALL_ERROR,[],"Failure","ER500",$e->getMessage());
        }
    }

    public function deleteMedia(Request $request, $media_id = null){
        try {
            $media = ProjectMedia::find($media_id);
            if($media){
                $isDeleted = $media->delete();
                return $this->prepareJsonResp(AjaxController::AJAX_CALL_SUCCESS,['isDeleted'=>$isDeleted],"Sucess","ER000","Recource deleted successfully.");
            } else {
                return $this->prepareJsonResp(AjaxController::AJAX_CALL_ERROR,[],"Failure","ER401","Could not find the resource.");
            }
        } catch (Exception $e) {
            return $this->prepareJsonResp(AjaxController::AJAX_CALL_ERROR,[],"Failure","ER500",$e->getMessage());
        }
    }

    public function uploadImage(Request $request){
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        try {
            $file = $request->file("file");
            $locationPath  = "project/image";
            $fileName = $file->getClientOriginalName();
            $nameStr = date('YmdHis');
            $newName = str_replace(" ","_",$nameStr.$fileName);
            $this->uploadFile($locationPath , $file, $newName);
            //\Log::info("here in logs ".$newName.",".asset($locationPath."/".$newName));
            $projectMedia = new ProjectMedia();
            $projectMedia->project_id = $request->project_id;
            $projectMedia->file_type = 'image';
            $projectMedia->file_link = $locationPath."/".$newName;
            $projectMedia->media_info = json_encode(["title"=>$request->title]);
            $projectMedia->save();
            $projectMedia->file_link = asset("storage/".$projectMedia->file_link);
            $projectMedia->media_info = json_decode($projectMedia->media_info, true);
            //return json_encode($projectMedia);
            return $this->prepareJsonResp(AjaxController::AJAX_CALL_SUCCESS,$projectMedia,"Success","ER000","");
        } catch (Exception $e) {
            return $this->prepareJsonResp(AjaxController::AJAX_CALL_ERROR,[],"Failure","ER500",$e->getMessage());
        }
    }

    public function uploadDoc(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:docx,pdf|max:2048*5',
        ]);
        try {
            $file = $request->file("file");
            $locationPath  = "project/docs";
            $fileName = $file->getClientOriginalName();
            $fileSize = $file->getSize();
            $nameStr = date('YmdHis');
            $newName = str_replace(" ","_",$nameStr.$fileName);
            $this->uploadFile($locationPath , $file, $newName);
            //\Log::info("here in logs ".$newName.",".asset($locationPath."/".$newName));
            $projectMedia = new ProjectMedia();
            $projectMedia->project_id = $request->project_id;
            $projectMedia->file_type = "doc";
            $projectMedia->file_link = $locationPath."/".$newName;
            $projectMedia->media_info = json_encode(["name"=>$fileName,"size"=> $fileSize,"size_label"=> ($fileSize/1000)." KB"]);
            $projectMedia->save();
            $projectMedia->file_link = asset("storage/".$projectMedia->file_link);
            $projectMedia->media_info = json_decode($projectMedia->media_info, true);
            return $this->prepareJsonResp(AjaxController::AJAX_CALL_SUCCESS,$projectMedia,"Success","ER000","");
        } catch (Exception $e) {
            return $this->prepareJsonResp(AjaxController::AJAX_CALL_ERROR,[],"Failure","ER500",$e->getMessage());
        }
    }

}
?>