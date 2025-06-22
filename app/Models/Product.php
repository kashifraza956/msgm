<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'image',
        'sizes'
    ];

    protected $casts = [
        'sizes' => 'array',
    ];

    /**
     * Ensure the sizes attribute is always returned as an array.
     * This also supports legacy records that may contain a
     * JSON encoded string due to previous double encoding.
     */
    public function getSizesAttribute($value)
    {
        if (is_array($value)) {
            return $value;
        }

        $decoded = json_decode($value, true);
        return is_array($decoded) ? $decoded : [];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
