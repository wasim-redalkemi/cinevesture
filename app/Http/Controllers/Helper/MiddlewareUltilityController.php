<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use App\Models\UserInvite;
use App\Models\UserJob;
use App\Models\UserProject;
use Exception;
use Illuminate\Http\Request;

class MiddlewareUltilityController extends Controller
{
    public static function checkActionLimit($permission_id,$limit)
    {
        try{
              $selcted_permission = session()->get('permission')->where('id',$permission_id)->first();

              if($selcted_permission->getOperation->url_key == 'job-create'){
                   $count = UserJob::query()->where('user_id',auth()->user()->id)->count();
              }elseif($selcted_permission->getOperation->url_key == 'project-overview'){
                   $count = UserProject::query()->where('user_id',auth()->user()->id)->count();
              }elseif($selcted_permission->getOperation->url_key == 'team-email'){
                   $count = UserInvite::query()->where('user_id',auth()->user()->id)->where('accepted','1')->count();
              }
              if($count >= $selcted_permission->limit){
                return true;
              }

              return false;


        }catch(Exception $e){
            
        }
    }
}
