<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image_url'];

    public function professionals()
    {
        return $this->belongsToMany(User::class, 'professional_categories', 'category_id', 'professional_user_id');
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
