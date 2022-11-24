<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// SoftDeleteをuse宣言する

class Store extends Model
{
    use HasFactory;
    // SoftDeleteをuse宣言する
    
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
