<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comment';

    protected $fillable = ['id', 'idUser', 'idTinTuc', 'NoiDung'];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'idTintuc');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'idUser');
    }
}
