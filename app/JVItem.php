<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JVItem extends Model
{
    public function jv()
    {
        return $this->belongsTo('App\JV','j_v_id','id');
    }
    public function accountHead()
    {
        return $this->belongsTo('App\AccountHead','account_head_id','id');
    }
}
