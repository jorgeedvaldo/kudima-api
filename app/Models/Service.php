<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'professional_id',
        'category_id',
        'title',
        'description',
        'price',
        'duration_estimate',
        'active',
    ];

    public function professional()
    {
        return $this->belongsTo(User::class, 'professional_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
