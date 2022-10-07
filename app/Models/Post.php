<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }

    public function wert()
    {
        return $this->belongsTo(Wert::class);
    }

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'image',
        'excerpt',
        'body'
    ];
}
