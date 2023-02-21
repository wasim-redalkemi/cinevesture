<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectListProjects extends Model
{
    use HasFactory;
    protected $table = 'project_lists_projects';
    public function lists()
    {
        return $this->belongsTo(ProjectList::class,'list_id');
    }
    public function projects()
    {
        return $this->belongsTo(UserProject::class,'project_id');
    }
}
