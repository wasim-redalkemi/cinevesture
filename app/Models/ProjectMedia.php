<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectMedia extends Model
{
    use HasFactory ;
    protected $table = 'project_medias';

    protected $appends = ['thumbnail_label'];

    public function getThumbnailLabelAttribute(){
        if($this->file_type == 'video'){
            if(is_array($this->media_info)){
                return $this->media_info["thumbnail"];
            } else {
                $mi = json_decode($this->media_info);
                return $mi->thumbnail;
            }
        }
        return "";
    }

}
