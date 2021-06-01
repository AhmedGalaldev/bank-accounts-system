<?php

namespace App\Traits;

use App\Models\Role;

trait RoleTrait
{
    public function hasRole($role)
    {
        if ($this->roles()->where('roles.name', $role)->exists()) {
            return true;
        }
        return false;
    }

    public function assignRole($name)
    {
        $role = Role::where('name', $name)->first();
        if ($role) {
            $attachedIds = $this->roles->pluck('id')->toArray();
            if(!in_array($role->id, $attachedIds))
                return $this->roles()->attach($role);
        }
        return false;
    }

    public function removeRole($name)
    {
        $role = Role::where('name', $name)->first();
        if ($role) {
            $attachedIds = $this->roles->pluck('id')->toArray();
            if(in_array($role->id, $attachedIds))
                return $this->roles()->detach($role);
        }
        return false;
    }
}