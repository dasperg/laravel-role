<?php

namespace Dasperg\Role;

trait RoleTrait
{
    /**
     * @return mixed
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * @param array|string $roles
     * @return boolean
     */
    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) ||
                abort(401);
        }
        return $this->hasRole($roles) ||
            abort(401);
    }

    /**
     * @param array $roles
     * @return boolean
     */
    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    /**
     * @param string $role
     * @return boolean
     */
    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }
}
