<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


use Illuminate\Database\Eloquent\Model;

class Permission extends \Spatie\Permission\Models\Permission
{
    public static function defaultPermissions()
{
    return [
        'view_users',
        'add_users',
        'edit_users',
        'delete_users',

        'view_roles',
        'add_roles',
        'edit_roles',
        'delete_roles',

        'view_posts',
        'add_posts',
        'edit_posts',
        'delete_posts',
    ];
}
}

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    //
}