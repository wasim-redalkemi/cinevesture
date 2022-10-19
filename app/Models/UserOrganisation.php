<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrganisation extends Model
{
    use HasFactory;

    public function country()
    {
        return $this->hasOne(MasterCountry::class,'id','location_in');
    }

    public function organizationServices()
    {
        return $this->hasMany(UserOrganisationService::class,'organisation_id');
    }

    public function organizationLanguages()
    {
        return $this->hasMany(UserOrganisationLanguage::class,'organisation_id');
    }
}
