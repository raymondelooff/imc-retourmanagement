<?php

namespace App\Policies;

use App\Product;
use App\User;

class ProductPolicy
{
    /**
     * @param User $user
     * @return bool|null
     */
    public function before(User $user) {
        if($user->isAdmin()) {
            return true;
        }
        return null;
    }

    /**
     * Determine if the given product can be updated by the user.
     *
     * @param User $user
     * @param Product $product
     * @return bool
     */
    public function update(User $user, Product $product)
    {
        return $user->id === $product->supplier;
    }
}
