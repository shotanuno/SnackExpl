<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable =[
        'name',
        'overview'
    ];
    
    public function snacks()
    {
        return $this->belongsToMany(Snack::class);
    }
    
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    
    
}
