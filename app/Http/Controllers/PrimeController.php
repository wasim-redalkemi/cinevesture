<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserJob;
use App\Models\UserProject;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrimeController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function uploadFile($targetDir, $file, $fileName = null)
    {

        try {
            Storage::makeDirectory($targetDir); //this function creates a full path directory according to filesystem driver
            if (is_string($file)) {
               $path = Storage::put($targetDir.$fileName,$file,$fileName);
            }else{
                if ($fileName == null) {
                    $path = $file->store($targetDir); //this will upload the file in given direcory with auto unique generate name
                } else {
                    $path = $file->storeAs($targetDir, $fileName); //this is same with store, but accept a file name
                }
            }
           
            return $path;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function prepareJsonResp ($status = 0,  $payload = [], $msg = "", $error = "ER000", $error_msg = "") {
        $data = [
            "status" => $status,
            "payload" => $payload,
            "message" => $msg,
            "error" => $error,
            "error_msg" => $error_msg
        ];
        return json_encode($data);
    }
    
    public function getCreatedById()
    {
        $id = auth()->user()->id;
        
        if(auth()->user()->parent_user_id != 0){$id = auth()->user()->parent_user_id;}
        return $id;
    }

    public function suspendUserEntities($user=[])
    {
        if(empty($user))
        {
            $user=User::query()->withTrashed()->where('deleted_at','!=',null)->orWhere('status','0')->pluck('id');
        }
        $suspendProjects=$this->suspendUserProjects($user);
        $suspendJob=$this->suspendUserJob($user);
    }

    public function suspendUserProjects($ids=[])
    {
        return $projectUnpublish=UserProject::query()->whereIn('user_id', $ids)->update(['user_status'=>'draft']);
    }

    public function suspendUserJob($ids=[])
    {
        return $jobUnpublish=UserJob::query()->whereIn('user_id', $ids)->update(['save_type' => 'unpublished']);
    }
    
    
}
