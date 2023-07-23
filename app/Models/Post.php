<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title','author','content'];

    protected static function booted(): void    {
        static::creating(function (self $model) {
            $model->updated_at = null;
        });
    }
}
