<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image_url'];

    public function getImageUrlAttribute($value)
    {
        if (!$value) {
            return null;
        }
        return str_starts_with($value, 'http') ? $value : asset('storage/' . $value);
    }

    public function professionals()
    {
        return $this->belongsToMany(User::class, 'professional_categories', 'category_id', 'professional_user_id');
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
