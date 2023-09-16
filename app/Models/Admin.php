<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
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
    public static function getPermissionGroup(){
        $permission_groups =Permission::select('group_name')->groupBy('group_name')->get();
        return $permission_groups;
    }

    public static function roleHasPermission($role,$permissions){
        $haspermission = true;
        foreach ($permissions as $permission) {
           if($role->hasPermissionTo($permission->name)){
            $haspermission = false;
            return $haspermission;
           }
        }
        return $haspermission;
    }

    public static function getPermissionByGroupName($group_name){
        $permissions = Permission::select('name','id')
                       ->where('group_name',$group_name)
                       ->get();
        return $permissions;
    }
    public function office_name()
    {
        return $this->hasOne(Office::class, 'id', 'office_id');
    }
}
