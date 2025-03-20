<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use SoftDeletes,HasFactory;

    protected $fillable = ['user_id','policeNumber','merk','type','capacity','price','photo'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
