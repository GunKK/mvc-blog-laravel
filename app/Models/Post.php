<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $table = 'tintuc';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'TieuDe',
        'TieuDeKhongDau',
        'TomTat',
        'NoiDung',
        'Hinh',
        'NoiBat',
        'SoLuotXem',
        'idLoaiTin',
    ];

    public function topic(): BelongsTo
    {
        return $this->beLongsTo(Topic::class, 'idLoaiTin');
    }
}
