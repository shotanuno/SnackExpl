<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'body',
        'rating',
        'user_id'
    ];
    
    public function snack()
    {
        return $this->belongsTo(Snack::class);
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
