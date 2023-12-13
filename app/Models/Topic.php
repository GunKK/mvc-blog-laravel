<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Topic extends Model
{
    use HasFactory;

    protected $table = 'loaitin';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'idTheLoai', 'Ten', 'TenKhongDau'];

    public function post(): HasMany
    {
        return $this->hasMany(Post::class, 'idLoaiTin', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'idTheLoai');
    }
}
