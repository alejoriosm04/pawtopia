<?php
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home.index'));
});

Breadcrumbs::for('pet.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Pet.pets_title'), route('pet.index'));
});

Breadcrumbs::for('pet.show', function ($trail, $pet) {
    $trail->parent('pet.index');
    $trail->push($pet->getName(), route('pet.show', $pet->getId()));
});

Breadcrumbs::for('pet.create', function ($trail) {
    $trail->parent('pet.index');
    $trail->push(__('Pet.create_pet_title'), route('pet.create'));
});

Breadcrumbs::for('pet.edit', function ($trail, $pet) {
    $trail->parent('pet.show', $pet);
    $trail->push(__('Pet.edit_pet_title', ['name' => $pet->getName()]), route('pet.edit', $pet->getId()));
});

Breadcrumbs::for('pet.recommendations', function ($trail) {
    $trail->parent('pet.index');
    $trail->push(__('Pet.recommendations_title'), route('pets.recommendations'));
});

Breadcrumbs::for('product.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Product.index_title'), route('product.index'));
});

Breadcrumbs::for('product.show', function ($trail, $product) {
    $trail->parent('product.index');
    $trail->push($product->getName(), route('product.show', $product->getId()));
});

Breadcrumbs::for('product.category', function ($trail, $category) {
    $trail->parent('product.index');
    $trail->push(__('Product.category_title', ['category' => $category->getName()]), route('product.filterByCategory', $category->getId()));
});

Breadcrumbs::for('product.species', function ($trail, $species) {
    $trail->parent('product.index');
    $trail->push(__('Product.category_title', ['category' => $species->getName()]), route('product.filterBySpecies', $species->getName()));
});

Breadcrumbs::for('product.brand', function ($trail, $brand) {
    $trail->parent('product.index');
    $trail->push(__('Product.products_associated_message') . $brand, route('product.filterByBrand', $brand));
});

Breadcrumbs::for('product.search', function ($trail, $keyword) {
    $trail->parent('product.index');
    $trail->push(__('Product.results_for') . $keyword, route('product.search'));
});

Breadcrumbs::for('cart.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Cart.title'), route('cart.index'));
});

Breadcrumbs::for('cart.product', function ($trail, $product) {
    $trail->parent('cart.index');
    $trail->push($product->getName(), route('product.show', $product->getId()));
});

Breadcrumbs::for('cart.purchase', function ($trail, $order) {
    $trail->parent('cart.index');
    $trail->push(__('Order.title'), route('order.show', $order->getId()));
});

Breadcrumbs::for('user.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('User List'), route('user.index'));
});

Breadcrumbs::for('user.create', function ($trail) {
    $trail->parent('user.index');
    $trail->push(__('Create User'), route('user.create'));
});

Breadcrumbs::for('user.show', function ($trail, $user) {
    $trail->parent('home');
    $trail->push($user->getName(), route('user.show', $user->getId()));
});

Breadcrumbs::for('user.edit', function ($trail, $user) {
    $trail->parent('user.show', $user);
    $trail->push(__('Edit User'), route('user.edit', $user->getId()));
});

Breadcrumbs::for('user.orders', function ($trail) {
    $trail->parent('user.index');
    $trail->push(__('User.orders_title'), route('user.orders'));
});
