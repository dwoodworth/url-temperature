<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessLog extends Model
{
    //User assigned to this access log entry:
    public function user()
    {
	    return $this->belongsTo(User::class);
    }
}
