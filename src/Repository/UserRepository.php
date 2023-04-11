<?php

namespace EmailHandler\Repository;

use EmailHandler\Entity\User;

interface UserRepository
{
    public function registerUser(User $user): void;
//    public function updateProduct($productId, $name, $description, $productPrice, $availableQuantity): void;
//    public function deleteProduct(int $productId): void;
//    /** @return Product[] */
//    public function findAll(): array;
//    public function find(int $productId): Product;
}