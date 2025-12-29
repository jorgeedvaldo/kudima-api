<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function professionalProfile()
    {
        return $this->hasOne(ProfessionalProfile::class);
    }

    public function professionalCategories()
    {
        return $this->belongsToMany(Category::class, 'professional_categories', 'professional_user_id', 'category_id');
    }

    public function serviceRequestsAsClient()
    {
        return $this->hasMany(ServiceRequest::class, 'client_id');
    }

    public function serviceRequestsAsProfessional()
    {
        return $this->hasMany(ServiceRequest::class, 'professional_id');
    }

    public function reviewsAuthored()
    {
        return $this->hasMany(Review::class, 'reviewer_id');
    }

    public function reviewsReceived()
    {
        return $this->hasMany(Review::class, 'reviewee_id');
    }
}
