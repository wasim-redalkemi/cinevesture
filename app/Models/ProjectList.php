<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProjectList extends Model
{
    use HasFactory;
protected $table = 'project_lists';

// public function  lists()
// {  
//     return $this->hasMany(ProjectListProjects::class,'list_id','id');    
// }

    public function lists():BelongsToMany
    {
        return $this->belongsToMany(UserProject::class,ProjectListProjects::class,'list_id','project_id');
    }

    public function ProjectListCategory()
    {
        return $this->hasMany(ProjectListCategories::class,'list_id','id');
    }
}
