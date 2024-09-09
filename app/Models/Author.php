<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'surname'];

    public function books(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Book::class);
    }

    public function scopeSearch($query, $search = '')
    {
        return $query
            ->where('name', 'LIKE', '%' . $search . '%')
            ->orWhere('surname', 'LIKE', '%' . $search . '%');

    }
}
