<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    // title列の登録(Category::create)を許可する
    protected $fillable = ['title'];

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
