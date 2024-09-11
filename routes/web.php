<?php

use App\Http\Controllers\PaymentController;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminSubcategoryComponent;
use App\Http\Livewire\Admin\AdminAddcategoryComponent;
use App\Http\Livewire\Admin\AdminEditSubcategoryComponent;
use App\Http\Livewire\Admin\AdminAddSubCategoryComponent;
use App\Http\Livewire\Admin\AdminAddHomeSlider;
use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEditCtegoryComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\AdminSaleComponent;
use App\Http\Livewire\Admin\CouponsComponent;
use App\Http\Livewire\Admin\AddCouponComponent;
use App\Http\Livewire\Admin\AdminAddFeaturedProductComponent;
use App\Http\Livewire\Admin\AdminChangePasswordComponent;
use App\Http\Livewire\Admin\AdminFeaturedProductsComponent;
use App\Http\Livewire\Admin\AdminProfileComponent;
use App\Http\Livewire\Admin\AdminUpdateProfileComponent;
use App\Http\Livewire\Admin\EditCouponComponent;
use App\Http\Livewire\Admin\OrderComponent;
use App\Http\Livewire\Admin\OrderDetailsComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\User\UserOrderDetailsComponent;
use App\Http\Livewire\User\UserOrdersComponent;
use App\Http\Livewire\User\UserReviewComponent;
use App\Http\Livewire\WishlistComponent;
use Faker\Guesser\Name;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/hh', function () {
    \App\Services\Esewa::pay('100', 'xyz', 10);
    return view('hhh');
});

Route::get('/', HomeComponent::class)->name('home');

Route::get('/cart', CartComponent::class)->name('product.cart');

Route::get('/shop', ShopComponent::class)->name('shop');

Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');

Route::get('/product-category/{category_slug}', CategoryComponent::class)->name('product.category');
Route::get('/product-search', SearchComponent::class)->name('product.search');
Route::get('/wishlist', WishlistComponent::class)->name('product.wishlist');
Route::get('/checkout', CheckoutComponent::class)->name('checkout')->middleware('auth');
Route::get('/thank-you', ThankyouComponent::class)->name('thankyou');
Route::get('/proceed-to-pay/{order}', PaymentController::class)->name('proceed-to-pay');
//Route::get('/product-search/{category_slug}/')


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');



//for user or customer
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');

    Route::get('/user/orders', UserOrdersComponent::class)->name('user.orders');
    Route::get('/user/orders/{order_id}', UserOrderDetailsComponent::class)->name('user.orderdetails');

    Route::get('/user/review/{order_item_id}', UserReviewComponent::class)->name('user.review');
});

//for user or admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    Route::get('/admin', AdminDashboardComponent::class)->name('admin.dashboard');

    Route::get('/admin/categories', AdminCategoryComponent::class)->name('admin.categories');
    Route::get('/admin/categories/add', AdminAddCategoryComponent::class)->name('admin.addcategory');
    Route::get('/admin/categories/edit/{category_slug}', AdminEditCtegoryComponent::class)->name('admin.editcategory');


    Route::get('/admin/products', AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/products/add', AdminAddProductComponent::class)->name('admin.addproduct');
    route::get('/admin/products/edit/{product_slug}', AdminEditProductComponent::class)->name('admin.editproduct');

    Route::get('/admin/slider/', AdminHomeSliderComponent::class)->name('admin.sliders');
    Route::get('/admin/slider/add', AdminAddHomeSliderComponent::class)->name('admin.addslider');
    Route::get('/admin/slider/edit/{slider_id}', AdminEditHomeSliderComponent::class)->name('admin.editslider');

    Route::get('/admin/coupons', CouponsComponent::class)->name('admin.coupons');
    Route::get('/admin/coupon/add', AddCouponComponent::class)->name('admin.addcoupon');
    Route::get('/admin/coupon/edit/{coupon_id}', EditCouponComponent::class)->name('admin.editcoupon');

    Route::get('/admin/featured-products', AdminFeaturedProductsComponent::class)->name('admin.featuredproducts');
    Route::get('/admin/featured-products/add', AdminAddFeaturedProductComponent::class)->name('admin.addfeaturedproduct');

    Route::get('/admin/sale', AdminSaleComponent::class)->name('admin.sale');

    Route::get('admin/orders', OrderComponent::class)->name('admin.orders');
    Route::get('admin/orders/{order_id}', OrderDetailsComponent::class)->name('admin.orderdetails');

    Route::get('/admin/myprofile', AdminProfileComponent::class)->name('admin.profile');
    Route::get('/admin/update-profile/{user_id}', AdminUpdateProfileComponent::class)->name('admin.updateprofile');
    Route::get('/admin/change-password', AdminChangePasswordComponent::class)->name('admin.changepassword');
});
