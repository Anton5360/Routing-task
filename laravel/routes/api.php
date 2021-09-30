<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductCoverController;
use App\Http\Controllers\Api\ProductReviewLikeController;
use App\Http\Controllers\Api\ProductOrderController;
use App\Http\Controllers\Api\ProductPaymentApplePayController;
use App\Http\Controllers\Api\ProductPaymentPayPalController;
use App\Http\Controllers\Api\ProductPaymentStripeController;
use App\Http\Controllers\Api\ProductReviewController;
use App\Http\Controllers\Api\ProductWishlistController;
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
    Route::resource('product', ProductController::class)->only([
        'store', 'destroy'
    ]);
});

Route::middleware('auth:sanctum')->group(function() {

    Route::resource('product/order', ProductOrderController::class)->only('store');

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
