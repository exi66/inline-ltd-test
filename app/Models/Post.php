<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     * @property string $title
     * @property string $body
     */
    protected $fillable = [
        'title',
        'body',
    ];
}
