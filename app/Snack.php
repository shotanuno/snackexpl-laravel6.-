<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Snack extends Model
{
    use SoftDeletes;
    
    protected $fillable =[
        'name',
        'overview',
        'rating_average'
        ];
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function comments()
    {
        return $this->hasMany("App\Comment");
    }
}
