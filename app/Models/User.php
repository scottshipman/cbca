<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'address1',
        'address2',
        'state',
        'city',
        'zip',
        'phone',
        'run_for_office',
        'volunteer',
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

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($roleName)
    {
        return in_array($roleName, $this->roles()->pluck('name')->toArray());
    }

    public function memberships()
    {
        return $this->belongsToMany(Membership::class);
    }

    public function isActiveMember() {
        $latestMembership = Membership::latest()->first();
        if(!$latestMembership) {return false;}
        return in_array($latestMembership->id, $this->memberships()->pluck('membership_id')->toArray());
    }

    public function isAdmin()
    {
        return $this->hasRole('admin') || $this->hasRole('board')  || $this->hasRole('editor') ? true : false;
    }
}
