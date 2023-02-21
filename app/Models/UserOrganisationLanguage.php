<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrganisationLanguage extends Model
{
    use HasFactory;

    public function languages()
    {
        return $this->belongsTo(MasterLanguage::class,'language_id');
    }
}
