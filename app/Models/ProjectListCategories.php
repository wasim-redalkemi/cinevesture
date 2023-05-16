<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectListCategories extends Model
{
    use HasFactory;

    public function projectCategories()
    {
        return $this->belongsTo(ProjectCategory::class, 'category_id', 'category_id');
    }
    // public function projectListProjects()
    // {
    //     return $this->belongsToMany(ProjectCategory::class, ProjectListProjects::class ,'category_id', 'category_id');
    // }
}
