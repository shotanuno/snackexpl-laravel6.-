<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function snack()
    {
        return $this->belongsTo("App\Snack");
    }
}
