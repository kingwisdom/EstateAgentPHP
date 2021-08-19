<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
            'title',
            'description',
            'type',
            'category_id',
            'user_id',
            'item_code',
            'phone',
            'condition',
            'price',
            'image',
            'lga',
            'state',
            'address',
            'published'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
