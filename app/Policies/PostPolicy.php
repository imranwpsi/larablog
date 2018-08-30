<?php

namespace App\Policies;

use App\Model\Admin\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\Model\Admin\Admin  $user
     * @return mixed
     */
    public function view(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\Model\Admin\Admin  $user
     * @return mixed
     */
    public function create(Admin $user)
    {
        return $this->getPermission($user,1);
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\Model\Admin\Admin  $user
     * @return mixed
     */
    public function update(Admin $user)
    {
        return $this->getPermission($user,3);
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\Model\Admin\Admin  $user
     * @return mixed
     */
    public function delete(Admin $user)
    {
        return $this->getPermission($user,4);
    }

    /**
     * Determine whether the user can tag the post.
     *
     * @param  \App\Model\Admin\Admin  $user
     * @return mixed
     */
    public function tag(Admin $user)
    {
        return $this->getPermission($user,9);
    }

    /**
     * Determine whether the user can category the post.
     *
     * @param  \App\Model\Admin\Admin  $user
     * @return mixed
     */
    public function category(Admin $user)
    {
        return $this->getPermission($user,10);
    }

    protected function getPermission($user,$p_id)
    {
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                if ($permission->id == $p_id) {
                    return true;
                }
            }
        }
        return false;
    }
}
