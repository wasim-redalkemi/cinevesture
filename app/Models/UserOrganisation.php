<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrganisation extends Model
{
    use HasFactory;

    public function country()
    {
        return $this->belongsTo(MasterCountry::class,'location_in');
    }
    public function organizationServices()
    {
        return $this->hasMany(UserOrganisationService::class,'organisation_id');
    }

    public function organizationLanguages()
    {
        return $this->hasMany(UserOrganisationLanguage::class,'organisation_id');
    }

    public function organizationType()
    {
        return $this->belongsTo(MasterOrganisationType::class,'type');
    }
    public function memberUser()
    {
       return $this->hasMany(User::class,'parent_user_id','user_id');
    }
}
