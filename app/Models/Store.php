<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// SoftDeleteをuse宣言する

class Store extends Model
{
    use HasFactory;
    // SoftDeleteをuse宣言する
    
    // snackとの多対多 リレーションを定義する
    
    // imageとの一対多ポリモーフィックリレーションを定義する.
    
    
}
