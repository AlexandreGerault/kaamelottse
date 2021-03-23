<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->hasPermission('product') || $user->hasRole('administrateur')) return true;
    }

    /**
     * Determine whether the user can view any products.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermission('product.viewany');
    }

    /**
     * Determine whether the user can view the product.
     *
     * @param User $user
     * @param Product $product
     * @return mixed
     */
    public function view(User $user, Product $product)
    {
        return $user->hasPermission('product.view');
    }

    /**
     * Determine whether the user can create products.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('product.create');
    }

    /**
     * Determine whether the user can update the product.
     *
     * @param User $user
     * @param Product $product
     * @return mixed
     */
    public function update(User $user, Product $product)
    {
        return $user->hasPermission('product.update');
    }

    /**
     * Determine whether the user can delete the product.
     *
     * @param User $user
     * @param Product $product
     * @return mixed
     */
    public function delete(User $user, Product $product)
    {
        return $user->hasPermission('product.delete');
    }

    /**
     * Determine whether the user can restore the product.
     *
     * @param User $user
     * @param Product $product
     * @return mixed
     */
    public function restore(User $user, Product $product)
    {
        return $user->hasPermission('product.restore');
    }

    /**
     * Determine whether the user can permanently delete the product.
     *
     * @param User $user
     * @param Product $product
     * @return mixed
     */
    public function forceDelete(User $user, Product $product)
    {
        return $user->hasPermission('product.forcedelete');
    }
}
