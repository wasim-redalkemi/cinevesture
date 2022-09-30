<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function projectViewRender($nextPage = '')
    {
        $user = User::query()->find(auth()->user()->id);


        
        switch ($nextPage) {
            case 'Details':
                return view('user.project.project_details', compact('user'));
                break;
            case 'Description':
                return view('user.project.project_description', compact('user'));
                break;
            case 'Gallery':
                return view('user.project.project_gallery', compact('user'));
                break;
            case 'Req & milestone':
                return view('user.project.project_milestones', compact('user'));
                break;
            case 'Preview':
                return view('user.project.project_preview', compact('user'));
                break;            
            default:
                return view('user.project.project_overview', compact('user'));
        }
    }
}
