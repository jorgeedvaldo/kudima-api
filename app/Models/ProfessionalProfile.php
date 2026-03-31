<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalProfile extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'bio', 'address', 'profile_picture_url', 'average_rating'];

    public function getProfilePictureUrlAttribute($value)
    {
        if (!$value) {
            return null;
        }
        return str_starts_with($value, 'http') ? $value : asset('storage/' . $value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
