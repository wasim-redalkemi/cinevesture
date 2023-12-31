<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrganisationService extends Model
{
    use HasFactory;

    public function services()
    {
        return $this->belongsTo(MasterOrganisationService::class,'services_id');
    }
}
