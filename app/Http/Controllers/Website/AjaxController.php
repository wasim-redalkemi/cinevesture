<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Controllers\WebController;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Helper\AppUtilityController;
use App\Models\ProjectMedia;
use App\Models\ProjectAssociation;
use App\Models\ProjectMilestone;
use App\Models\UserPortfolioImage;
use App\Models\UserProject;

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
                    $toReturn = $this->prepareJsonResp(SELF::AJAX_CALL_SUCCESS,$sourceResp['pl'],"Success","ER000","");
                } else {
                    $toReturn = $this->prepareJsonResp(SELF::AJAX_CALL_ERROR,[],"Failure","ER401","Invalid video url. Only Vimeo and Youtube links are allowed.");
                }
            } else {
                $toReturn = $this->prepareJsonResp(SELF::AJAX_CALL_ERROR,[],"Failure","ER501","Invalid request. Video URL is missing.");
            }
        } catch (Exception $e) {
            $toReturn = $this->prepareJsonResp(SELF::AJAX_CALL_ERROR,[],"Failure","ER500",$e->getMessage());
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
                return $this->prepareJsonResp(AjaxController::AJAX_CALL_SUCCESS,['isDeleted'=>$isDeleted],"Media deleted successfully.","ER000","");
            } else {
                return $this->prepareJsonResp(AjaxController::AJAX_CALL_ERROR,[],"Failure","ER401","Could not find the resource.");
            }
        } catch (Exception $e) {
            return $this->prepareJsonResp(AjaxController::AJAX_CALL_ERROR,[],"Failure","ER500",$e->getMessage());
        }
    }

    public function uploadImage(Request $request){
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:40000',
        ]);
        try {
            $file = $request->file("file");
            $locationPath  = "project/image";
            $fileName = $file->getClientOriginalName();
            //\Log::info("here in logs ".$fileName);
            $nameStr = date('YmdHis');
            $newName = str_replace(" ","_",$nameStr.$fileName);
            $this->uploadFile($locationPath , $file, $newName);
            //\Log::info("here in logs ".$newName.",".asset($locationPath."/".$newName));
            if($request->isBanner) {
                $project = UserProject::query()->find($request->project_id);
                if(!empty($project->banner_image)){
                    unlink(storage_path()."\app\public\/".$project->banner_image);
                }
                $project->banner_image = $locationPath."/".$newName;
                $project->save();
                return $this->prepareJsonResp(AjaxController::AJAX_CALL_SUCCESS,["url"=>asset("storage/".$project->banner_image)],"Success","ER000","");
            } else {
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
            }
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

    public function addProjAssociationEntry(Request $request, $project_id){
        $request->validate([
            'title' => 'required|string|max:50',
            'name' => 'nullable|string|max:50'
        ]);
        try {
            $ProjectAssociation = new ProjectAssociation();
            //$ProjectAssociation->id = 1;
            $ProjectAssociation->project_id = $project_id;
            $ProjectAssociation->project_associate_title = $request->title;
            $ProjectAssociation->project_associate_name = $request->name;
            $ProjectAssociation->save();
            return $this->prepareJsonResp(AjaxController::AJAX_CALL_SUCCESS,$ProjectAssociation,"Success","ER000","");
        } catch (Exception $e) {
            return $this->prepareJsonResp(AjaxController::AJAX_CALL_ERROR,[],"Failure","ER500",$e->getMessage());
        }
    }

    public function updateProjAssociationEntry(Request $request, $associate_id = null){
        try {
            $associate = ProjectMilestone::find($associate_id);
            if($associate){
                if(isset($request->project_associate_title))
                    $associate->project_associate_title = $request->project_associate_title;
                if(isset($request->project_milestone_budget))
                    $associate->project_associate_name = $request->project_associate_name;
                $associate->save();
                return $this->prepareJsonResp(AjaxController::AJAX_CALL_SUCCESS,$associate,"Record updated successfully.","ER000","");
            } else {
                return $this->prepareJsonResp(AjaxController::AJAX_CALL_ERROR,[],"Failure","ER401","Could not find the resource.");
            }
        } catch (Exception $e) {
            return $this->prepareJsonResp(AjaxController::AJAX_CALL_ERROR,[],"Failure","ER500",$e->getMessage());
        }
    }

    public function removeProjAssociationEntry(Request $request, $associate_id = null){
        try {
            $media = ProjectAssociation::find($associate_id);
            if($media){
                $isDeleted = $media->delete();
                return $this->prepareJsonResp(AjaxController::AJAX_CALL_SUCCESS,['isDeleted'=>$isDeleted],"Project association deleted successfully.","ER000","");
            } else {
                return $this->prepareJsonResp(AjaxController::AJAX_CALL_ERROR,[],"Failure","ER401","Could not find the resource.");
            }
        } catch (Exception $e) {
            return $this->prepareJsonResp(AjaxController::AJAX_CALL_ERROR,[],"Failure","ER500",$e->getMessage());
        }
    }

    public function addProjMilestoneEntry(Request $request, $project_id){
        $request->validate([
            'project_milestone_description' => 'required|string|max:100',
            'project_milestone_budget' => 'required|string|max:50',
            'project_milestone_target_date' => 'required|date',
            // 'project_milestone_complete' => 'nullable|int|max:1'
        ]);
        try {
            $ProjectAssociation = new ProjectMilestone();
            //$ProjectAssociation->id = 1;
            $ProjectAssociation->project_id = $project_id;
            $ProjectAssociation->description = $request->project_milestone_description;
            $ProjectAssociation->budget = $request->project_milestone_budget;
            $ProjectAssociation->target_date = $request->project_milestone_target_date;
            $ProjectAssociation->complete = $request->project_milestone_complete;
            $ProjectAssociation->save();
            return $this->prepareJsonResp(AjaxController::AJAX_CALL_SUCCESS,$ProjectAssociation,"Success","ER000","");
        } catch (Exception $e) {
            return $this->prepareJsonResp(AjaxController::AJAX_CALL_ERROR,[],"Failure","ER500",$e->getMessage());
        }
    }

    public function updateProjMilestoneEntry(Request $request, $milestone_id = null){
        try {
            $milestone = ProjectMilestone::find($milestone_id);
            if($milestone){
                if(isset($request->project_milestone_description))
                    $milestone->description = $request->project_milestone_description;
                if(isset($request->project_milestone_budget))
                    $milestone->budget = $request->project_milestone_budget;
                if(isset($request->project_milestone_target_date))
                    $milestone->target_date = $request->project_milestone_target_date;
                if(isset($request->project_milestone_complete))
                    $milestone->complete = $request->project_milestone_complete;
                $milestone->save();
                return $this->prepareJsonResp(AjaxController::AJAX_CALL_SUCCESS,$milestone,"Project milestone updated successfully.","ER000","");
            } else {
                return $this->prepareJsonResp(AjaxController::AJAX_CALL_ERROR,[],"Failure","ER401","Could not find the resource.");
            }
        } catch (Exception $e) {
            return $this->prepareJsonResp(AjaxController::AJAX_CALL_ERROR,[],"Failure","ER500",$e->getMessage());
        }
    }

    public function removeProjMilestoneEntry(Request $request, $milestone_id = null){
        try {
            $media = ProjectMilestone::find($milestone_id);
            if($media){
                $isDeleted = $media->delete();
                return $this->prepareJsonResp(AjaxController::AJAX_CALL_SUCCESS,['isDeleted'=>$isDeleted],"Project milestone removed successfully.","ER000","");
            } else {
                return $this->prepareJsonResp(AjaxController::AJAX_CALL_ERROR,[],"Failure","ER401","Could not find the resource.");
            }
        } catch (Exception $e) {
            return $this->prepareJsonResp(AjaxController::AJAX_CALL_ERROR,[],"Failure","ER500",$e->getMessage());
        }
    }

    /* not in use anywhere currently */
    public function addPortfolioImg(Request $request, $portfolio_id = null){
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        try {
            $file = $request->file("file");
            $fileName = $file->getClientOriginalName();
            $newName = str_replace(" ","_",date('YmdHis').$fileName);
            $locationPath  = "project/image";
            $uploadFile = $this->uploadFile($locationPath, $file, $newName);
            $UserPortfolioImage = new UserPortfolioImage();
            //$ProjectAssociation->id = 1;
            $UserPortfolioImage->portfolio_id = $portfolio_id;
            $UserPortfolioImage->file_type = "image";
            $UserPortfolioImage->file_link = $uploadFile;
            $UserPortfolioImage->save();
            return $this->prepareJsonResp(AjaxController::AJAX_CALL_SUCCESS,$UserPortfolioImage,"Success","ER000","");
        } catch (Exception $e) {
            return $this->prepareJsonResp(AjaxController::AJAX_CALL_ERROR,[],"Failure","ER500",$e->getMessage());
        }
    }

    public function deletePortfolioImg(Request $request, $img_id = null){
        try {
            $media = UserPortfolioImage::find($img_id);
            if($media){
                $isDeleted = $media->delete();
                return $this->prepareJsonResp(AjaxController::AJAX_CALL_SUCCESS,['isDeleted'=>$isDeleted],"Portfolio image deleted successfully.","ER000","");
            } else {
                return $this->prepareJsonResp(AjaxController::AJAX_CALL_ERROR,[],"Failure","ER401","Could not find the resource.");
            }
        } catch (Exception $e) {
            return $this->prepareJsonResp(AjaxController::AJAX_CALL_ERROR,[],"Failure","ER500",$e->getMessage());
        }
    }

}
?>