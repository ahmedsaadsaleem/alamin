<?php

namespace App\Policies;

use App\Models\GroupRole;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AuthorizeCheck
{
    // Check if user is adminstrator
    public static function isAdminstrator(User $user): bool
    {
        // dd(DB::table('user_groups')->where('group_name', 'admin')->value('id'));
        $userGroupId = DB::table('user_groups')->where('group_name', 'admin')->value('id');
        return $user->group_id === $userGroupId;
    }

    // Check if user is super admin
    public static function isSuperAdmin(User $user): bool
    {
        // dd(DB::table('user_groups')->where('group_name', 'super admin')->value('id'));
        $userGroupId = DB::table('user_groups')->where('group_name', 'super admin')->value('id');
        return $user->group_id === $userGroupId;
    }

    // Check if user is authorize
    public static function userCan(User $user, string $ability = null, string $target = null): bool
    {
        if ($target === null) {
            $target = Str::lower(Str::remove('Policy', class_basename(static::class))) . 's';
        }

        $role_id = Role::where('role', $ability)
                                ->where('target', $target)
                                ->value('id');
        $can = GroupRole::where('group_id', $user->group_id)
                                ->where('role_id', $role_id)
                                ->exists();

        return (bool) $can;
    }
}