<?php

namespace Modules\Nintei\Models\Auth;

use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\Nintei\Models\Auth\Traits\Attribute\UserAttribute;
use Modules\Nintei\Models\Auth\Traits\Method\UserMethod;
use Modules\Nintei\Models\Auth\Traits\Relationship\UserRelationship;
use Modules\Nintei\Models\Auth\Traits\Scope\UserScope;
use Modules\Nintei\Models\Auth\Traits\SendUserPasswordReset;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User.
 */
class User extends Authenticatable
{
    use HasRoles,
    Notifiable,
    SendUserPasswordReset,
    SoftDeletes,
    UserAttribute,
    UserMethod,
    UserRelationship,
    UserScope,
        Uuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'avatar_type',
        'avatar_location',
        'password',
        'password_changed_at',
        'active',
        'confirmation_code',
        'confirmed',
        'timezone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The dynamic attributes from mutators that should be returned with the user object.
     * @var array
     */
    protected $appends = ['full_name'];
}
