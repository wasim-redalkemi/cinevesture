<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectSearch extends Model
{
    use HasFactory;
    protected $table = 'project_search';
    public function lists()
    {
        return $this->belongsTo(ProjectList::class,'list_id','id');
    }
    public function projects()
    {
        return $this->belongsTo(UserProject::class,'project_id','id');
    }
}
