<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\Builder;

class OrderPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $string)
    {
        if ($user->hasPermission('order') || $user->hasRole('administrateur')) return true;
    }

    /**
     * Determine whether the user can view any orders.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the order.
     *
     * @param User $user
     * @param Order $order
     * @return mixed
     */
    public function view(User $user, Order $order)
    {
        return $user->hasPermission('order.viewany') || $order->customer->id == $user->id;
    }

    /**
     * Determine whether the user can create orders.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return User::noPendingOrder()->get()->contains($user);
    }

    /**
     * Determine whether the user can create orders.
     *
     * @param User $user
     * @return mixed
     */
    public function createForOthers(User $user)
    {
        return User::hasPermission('order.create-for-others');
    }

    /**
     * Determine whether the user can update the order.
     *
     * @param User $user
     * @param Order $order
     * @return mixed
     */
    public function update(User $user, Order $order)
    {
        return ($order->customer->id === $user->id && $order->status == config('ordering.status.NOT_COMPLETED'))
            || $user->hasPermission('order.update');
    }

    /**
     * Determine whether the user can delete the order.
     *
     * @param User $user
     * @param Order $order
     * @return mixed
     */
    public function delete(User $user, Order $order)
    {
        return ($order->customer->id === $user->id && $order->status == config('ordering.status.NOT_COMPLETED'))
            || $user->hasPermission('order.delete');
    }

    /**
     * Determine whether the user can restore the order.
     *
     * @param User $user
     * @param Order $order
     * @return mixed
     */
    public function restore(User $user, Order $order)
    {
        return $user->hasPermission('order.restore');
    }

    /**
     * Determine whether the user can permanently delete the order.
     *
     * @param User $user
     * @param Order $order
     * @return mixed
     */
    public function forceDelete(User $user, Order $order)
    {
        return $user->hasPermission('order.forcedelete');
    }
}
