<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLanguage extends Model
{
    use HasFactory;
    public function getLanguages()
    {
        return $this->belongsTo(MasterLanguage::class,'language_id');
    }
}
