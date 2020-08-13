<?php

namespace App\Policies;

use App\Models\Message;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessagePolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        return $user->hasPermission('message') || $user->hasRole('administrateur');
    }

    /**
     * Determine whether the user can view any messages.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermission('message.viewany');
    }

    /**
     * Determine whether the user can view the message.
     *
     * @param User $user
     * @param Message $message
     * @return mixed
     */
    public function view(User $user, Message $message)
    {
        return $user->hasPermission('message.view');
    }

    /**
     * Determine whether the user can create messages.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('message.create');
    }

    /**
     * Determine whether the user can update the message.
     *
     * @param User $user
     * @param Message $message
     * @return mixed
     */
    public function update(User $user, Message $message)
    {
        return $user->hasPermission('message.update');
    }

    /**
     * Determine whether the user can delete the message.
     *
     * @param User $user
     * @param Message $message
     * @return mixed
     */
    public function delete(User $user, Message $message)
    {
        return $user->hasPermission('message.delete');
    }

    /**
     * Determine whether the user can restore the message.
     *
     * @param User $user
     * @param Message $message
     * @return mixed
     */
    public function restore(User $user, Message $message)
    {
        return $user->hasPermission('message.restore');
    }

    /**
     * Determine whether the user can permanently delete the message.
     *
     * @param User $user
     * @param Message $message
     * @return mixed
     */
    public function forceDelete(User $user, Message $message)
    {
        return $user->hasPermission('message.forcedelete');
    }

    /**
     * Determine whether the user can respond to a message.
     *
     * @param User $user
     * @param Message $message
     */
    public function respond(User $user, Message $message)
    {
        return $user->hasPermission('message.respond');
    }
}
