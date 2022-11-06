<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'body',
        'rating',
        'user_id'
    ];
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function snack()
    {
        return $this->belongsTo("App\Snack");
    }
    
    public function users()
    {
        return $this->belongsToMany("App\User", "comment_user", "user_id", "comment_id");
    }
    
}
