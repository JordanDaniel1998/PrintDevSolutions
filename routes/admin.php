<?php

use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\Auth\AdminLogoutController;
use App\Http\Controllers\Admin\Blog\BlogsController;
use App\Http\Controllers\Admin\CategoriesBlogs\CategoriesBlogsController;
use App\Http\Controllers\Admin\CategoriesProducts\Brands\BrandsController;
use App\Http\Controllers\Admin\CategoriesProducts\Categories\CategoriesController;
use App\Http\Controllers\Admin\CategoriesProducts\CategoriesProductsController;
use App\Http\Controllers\Admin\CategoriesProducts\SubCategories\SubcategoriesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Highlighted\HighlightedController;
use App\Http\Controllers\Admin\ImagenesController;
use App\Http\Controllers\Admin\Information\InformationController;
use App\Http\Controllers\Admin\Partner\PartnersController;
use App\Http\Controllers\Admin\Product\ProductController;
use Illuminate\Support\Facades\Route;

/* Route::group(['prefix' => 'admin'], function () {
    /Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
}); */

Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'store']);
Route::post('/admin/logout', [AdminLogoutController::class, 'store'])->name('admin.logout');

Route::group(['prefix' => 'admin', 'middleware' => ['auth.admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // ------- products --------
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::post('/productos', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::post('/products/{product}/update', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/products/visible', [ProductController::class, 'visible'])->name('products.visible');
    Route::get('/products/highlighted', [ProductController::class, 'highlighted'])->name('products.highlighted');
    Route::get('/products/categories/subcategories/{categoryId}', [ProductController::class, 'getSubcategories']);
    Route::get('/products/subcategories/brands/{subcategoryId}', [ProductController::class, 'getBrands']);

    // ------- categories of categories --------

    Route::get('products/categories-productos', [CategoriesProductsController::class, 'index'])->name('categories.index');

    Route::get('products/categories', [CategoriesController::class, 'index'])->name('productsOfCategories.index');
    Route::post('products/categories', [CategoriesController::class, 'store'])->name('productsOfCategories.store');
    Route::post('products/categories/updates', [CategoriesController::class, 'update'])->name('productsOfCategories.update');
    Route::post('products/categories/edit', [CategoriesController::class, 'edit'])->name('productsOfCategories.edit');
    Route::delete('products/categories/{categorie}', [CategoriesController::class, 'destroy'])->name('productsOfCategories.destroy');
    Route::get('products/categories/data', [CategoriesController::class, 'getData'])->name('productsOfCategories.getData');

    // ------- Subcategories of categories --------
    Route::get('products/subcategories', [SubcategoriesController::class, 'index'])->name('productsOfSubCategories.index');
    Route::post('products/subcategories/store', [SubcategoriesController::class, 'store'])->name('productsOfSubCategories.store');
    Route::get('products/subcategories/{subcategorie}/edit', [SubcategoriesController::class, 'edit'])->name('productsOfSubCategories.edit');
    Route::post('products/subcategories/updates', [SubcategoriesController::class, 'update'])->name('productsOfSubCategories.update');
    Route::get('products/subcategories/data', [SubcategoriesController::class, 'getData'])->name('productsOfSubCategories.getData');
    Route::delete('products/subcategories/{subcategorie}', [SubcategoriesController::class, 'destroy'])->name('productsOfSubCategories.destroy');

    // ------- Brands of subcategories --------
    Route::get('products/brands', [BrandsController::class, 'index'])->name('productsBrand.index');
    Route::post('products/brands/store', [BrandsController::class, 'store'])->name('productsBrand.store');
    Route::get('products/brands/{brand}/edit', [BrandsController::class, 'edit'])->name('productsBrand.edit');
    Route::post('products/brands/updates', [BrandsController::class, 'update'])->name('productsBrand.update');
    Route::get('products/brands/data', [BrandsController::class, 'getData'])->name('productsBrand.getData');
    Route::delete('products/brands/{brand}', [BrandsController::class, 'destroy'])->name('productsBrand.destroy');

    // Highlighted
    Route::get('/highlighteds', [HighlightedController::class, 'index'])->name('highlighted.index');
    Route::post('/highlighteds', [HighlightedController::class, 'store'])->name('highlighted.store');
    Route::get('/highlighteds/{highlighted}/edit', [HighlightedController::class, 'edit'])->name('highlighted.edit');
    Route::post('/highlighteds/updates', [HighlightedController::class, 'update'])->name('highlighted.update');
    Route::get('/highlighteds/data', [HighlightedController::class, 'getData'])->name('highlighted.getData');
    Route::delete('/highlighteds/{highlighted}', [HighlightedController::class, 'destroy'])->name('highlighted.destroy');

    // Partners
    Route::get('/partners', [PartnersController::class, 'index'])->name('partners.index');
    Route::get('/partners/create', [PartnersController::class, 'create'])->name('partners.create');
    Route::post('/partners', [PartnersController::class, 'store'])->name('partners.store');
    Route::get('/partners/{partner}/edit', [PartnersController::class, 'edit'])->name('partners.edit');
    Route::post('/partners/{partner}/update', [PartnersController::class, 'update'])->name('partners.update');
    Route::get('/partners/visible', [PartnersController::class, 'visible'])->name('partners.visible');

    // Blogers
    Route::get('/articles', [BlogsController::class, 'index'])->name('articles.index');
    Route::get('/articles/create', [BlogsController::class, 'create'])->name('articles.create');
    Route::post('/articles', [BlogsController::class, 'store'])->name('articles.store');
    Route::get('/articles/edit/{blog}', [BlogsController::class, 'edit'])->name('articles.edit');
    Route::post('/articles/{blog}/update', [BlogsController::class, 'update'])->name('articles.update');
    Route::get('/articles/visible', [BlogsController::class, 'visible'])->name('articles.visible');
    Route::delete('/articles/{blog}', [BlogsController::class, 'destroy'])->name('articles.destroy');
    Route::get('/articles/data', [BlogsController::class, 'getData'])->name('articles.getData');

    // CategoriesOfBlogs
    Route::get('/articles/categories', [CategoriesBlogsController::class, 'index'])->name('categoriesOfArticles.index');
    Route::post('/articles/categories', [CategoriesBlogsController::class, 'store'])->name('categoriesOfArticles.store');
    Route::post('/articles/categories/updates', [CategoriesBlogsController::class, 'update'])->name('categoriesOfArticles.update');
    // Cuando usas Route model binding, el parametro debe coincidir con su modelo
    Route::get('/articles/categories/{categoryBlog}/edit', [CategoriesBlogsController::class, 'edit'])->name('categoriesOfArticles.edit');
    Route::delete('/articles/categories/{categoryBlog}', [CategoriesBlogsController::class, 'destroy'])->name('categoriesOfArticles.destroy');
    Route::get('/articles/categories/data', [CategoriesBlogsController::class, 'getData'])->name('categoriesOfArticles.getData');










    // Información personal
    Route::get('/information',[InformationController::class, 'index'])->name('admin.information');
    Route::post('/information',[InformationController::class, 'store'])->name('admin.store');


    // dropzone
    Route::post('/imagenes', [ImagenesController::class, 'store'])->name('imagenes.store');
    Route::post('/imagenes/delete', [ImagenesController::class, 'destroy'])->name('imagenes.destroy');
});