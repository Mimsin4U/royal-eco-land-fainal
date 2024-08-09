<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    private static $user, $directory,$type,$code;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    public static function newUser($request)
    {
        self::$user = new User();
        self::$user->name       = $request->name;
        self::$user->email      = $request->email;
        self::$user->password   = bcrypt($request->password);
        self::$user->mobile     = $request->mobile;
        if($request->type == 2){
            self::$user->type = $request->type;
            self::$user->code = $request->code;
        }
        self::$user->save();
        return self::$user;
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'user_role', 'user_id', 'role_id');
    }

    public static function updateUser($request, $id)
    {
        self::$user = User::find($id);
        


        self::$user->name       = $request->name;
        self::$user->email      = $request->email;
        if ($request->password)
        {
            self::$user->password   = bcrypt($request->password);
        }
        self::$user->mobile     = $request->mobile;
        self::$user->image      = 'dummy/profile/dummy_person.jpg';
        self::$user->save();
        return self::$user;
    }

    public static function deleteUser($id)
    {
        self::$user = User::find($id);
        self::$user->Delete();
    }

    public function hasAnyRole($roles) {
        if(is_array($roles)) {
            foreach ($roles as $role) {
                if($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole($role) {
        if($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }
}
