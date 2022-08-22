<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo('App\Models\Post', 'postId');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     * @property int $postId
     * @property string $name
     * @property string $email
     * @property string $body
     */
    protected $fillable = [
        'postId',
        'name',
        'email',
        'body',
    ];
}
