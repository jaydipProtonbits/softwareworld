<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Users\Settings\UserSetting;
use App\Models\Users\UserDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Claim;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
      'type_id',
      'name',
      'email',
      'password',
      'profile_pic',
      'claim_token',
      'email_verification_token',
      'email_verified_at',
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
        'password' => 'hashed',
    ];

    public function is_admin()
    {
      return in_array('admin', auth()->user()->roles()->pluck('name')->toArray()) ? true : false;
    }

    public function is_reviewer()
    {
      return in_array('reviewer', auth()->user()->roles()->pluck('name')->toArray()) ? true : false;
    }

    public function getProfileUrlAttribute()
    {
      return $this->profile_pic ? asset('assets/users/'.$this->profile_pic) : asset('assets/users/default-avatar.png');
    }

    public function user_details()
    {
      return $this->hasOne(UserDetail::class);
    }

    public function email_change()
    {
      return $this->hasOne(UserSetting::class);
    }

    public function createdServices()
    {
      return $this->hasMany(Services::class, 'created_by', 'id');
    }

    public function claimedServices()
    {
      return $this->hasMany(Services::class, 'claimed_by', 'id');
    }

    public function services()
    {
      return $this->createdServices->concat($this->claimedServices);
    }

    public function createdSoftware()
    {
      return $this->hasMany(Listing::class, 'created_by', 'id');
    }

    public function claimedSoftware()
    {
      return $this->hasMany(Listing::class, 'claimed_by', 'id');
    }

    public function pendingClaimed()
    {
      return $this->hasMany(Claim::class, 'user_id', 'id')
        ->where('status','!=','approved');
    }

    public function software()
    {
      return $this->createdSoftware->concat($this->claimedSoftware);
    }
}
