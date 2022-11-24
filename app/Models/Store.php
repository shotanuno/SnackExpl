<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// SoftDeleteをuse宣言する

class Store extends Model
{
    use HasFactory;
    // SoftDeleteをuse宣言する
    
    public function snacks()
    {
        return $this->belongsToMany(Snack::class);
    }
    
    // imageとの一対多ポリモーフィックリレーションを定義する.
    
    
}
