<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'password',
        'organization_id',
        'license',
        'user_type',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Change the relationship to use a custom accessor
    public function systemUserType()
    {
        return $this->hasOne(MasterUsertype::class, 'user_type', 'user_type');
        // Assuming MasterUsertype has a 'type' column that matches the user_type values
    }

    // Or alternatively, add an accessor to get full user type details
    public function getUserTypeDetailsAttribute()
    {
        return MasterUsertype::where('type', $this->user_type)->first();
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function projectAllocations()
    {
        return $this->hasMany(ProjectAllocation::class);
    }

    public function timeEntries()
    {
        return $this->hasMany(TimeEntry::class);
    }

    public function projectUserTypes()
    {
        return $this->hasMany(ProjectUserType::class);
    }

    public function google()
    {
        return $this->hasOne(Google::class);
    }

    /**
 * Get the staff record associated with the user.
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasOne
 */
public function staff()
{
    return $this->hasOne(Staff::class);
}

/**
 * Get staff ID directly from user model
 *
 * @return string|null
 */
protected function getStaffIdAttribute()
{
    return $this->staff?->id;
}

        /**
     * Boot method to automatically set license during user creation
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if ($user->organization_id) {
                $organization = Organization::findOrFail($user->organization_id);
                $user->license = $organization->license;
            }
        });
    }
}
