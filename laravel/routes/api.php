<?php

use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\Api\ProductCoverImageController;
use App\Http\Controllers\Api\LikeReviewsController;
use App\Http\Controllers\Api\ProductOrdersController;
use App\Http\Controllers\Api\PaymentsController;
use App\Http\Controllers\Api\ProductReviewsController;
use App\Http\Controllers\Api\WishlistsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum', 'isAdmin'])->group(function() {
    Route::resource('products', ProductsController::class)->only([
        'store', 'destroy'
    ]);
});

Route::middleware('auth:sanctum')->group(function() {

    Route::post('/products/{id}/orders', [ProductOrdersController::class, 'store']);

    Route::resource('product/review', ProductReviewController::class)->only([
        'index', 'store'
    ]);

    Route::resource('product/review/like', ProductReviewLikeController::class)->only([
        'store', 'destroy'
    ]);

    Route::resource('product/wishlist', ProductWishlistController::class)->only('store');

    Route::resource('product/cover', ProductCoverController::class)->only('update');


    Route::resource('payment/apple-pay', ProductPaymentApplePayController::class)->only('store');
    Route::resource('payment/stripe', ProductPaymentStripeController::class)->only('store');
    Route::resource('payment/pay-pal', ProductPaymentPayPalController::class)->only('store');
});
