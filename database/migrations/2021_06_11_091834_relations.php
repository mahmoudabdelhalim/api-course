<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Relations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //  This is Realations for the users Table ..
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('address_id')->references('id')->on('addresses');
        });
        //  This is Realations for the product_colors Table ..
        Schema::table('product_colors', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('color_id')->references('id')->on('colors');
        });
        //  This is Realations for the product_sizes Table ..
        Schema::table('product_sizes', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('size_id')->references('id')->on('sizes');
        });
        //  This is Realations for the product_images Table ..
        Schema::table('product_images', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
        });
        //  This is Realations for the product_componants Table ..
        Schema::table('product_componants', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
        });

        //  This is Realations for the products Table ..
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('shop_id')->references('id')->on('shops');
        });

        //  This is Realations for the categories Table ..
        Schema::table('categories', function (Blueprint $table) {
            $table->foreign('parent_category_id')->references('id')->on('categories');
        });
        //  This is Realations for the product_rates Table ..
        Schema::table('product_rates', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('user_id')->references('id')->on('users');
        });


        //  This is Realations for the messages Table ..
        Schema::table('messages', function (Blueprint $table) {
            $table->foreign('from_user_id')->references('id')->on('users');
            $table->foreign('to_user_id')->references('id')->on('users');
            $table->foreign('from_shop_id')->references('id')->on('shops');
        });
        //  This is Realations for the carts Table ..
        Schema::table('carts', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('user_id')->references('id')->on('users');
        });

        //  This is Realations for the carts Table ..
        Schema::table('cart_items', function (Blueprint $table) {
            $table->foreign('cart_id')->references('id')->on('carts');
            $table->foreign('product_id')->references('id')->on('products');
        });

        //  This is Realations for the payments Table ..
        Schema::table('payments', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
         //  This is Realations for the orders Table ..
         Schema::table('orders', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('address_id')->references('id')->on('addresses');
                  });

          //  This is Realations for the order_items Table ..
          Schema::table('order_items', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('cart_id')->references('id')->on('carts');
            $table->foreign('shop_id')->references('id')->on('shops');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
