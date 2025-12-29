<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'name',
        'description',
    ];

    public function professionals()
    {
        return $this->belongsToMany(User::class, 'professional_service', 'service_id', 'professional_id')
                    ->withPivot(['price', 'duration', 'active'])
                    ->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
