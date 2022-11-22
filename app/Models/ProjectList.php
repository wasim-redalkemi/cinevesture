<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectList extends Model
{
    use HasFactory;
protected $table = 'project_lists';

public function  lists()
{
  
    return $this->hasMany(ProjectListProjects::class,'list_id','id');
    
}
   


}
