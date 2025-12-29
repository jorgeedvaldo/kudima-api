<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalProfile extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'bio', 'profile_picture_url', 'average_rating'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
