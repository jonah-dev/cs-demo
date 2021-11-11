<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Product;
use App\Models\Inventory;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class);
            $table->foreignIdFor(Inventory::class);
            $table->string('street_address');
            $table->string('apartment')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('country_code');
            $table->string('phone_number');
            $table->string('email');
            $table->string('name');
            $table->string('payment_ref')->nullable();
            $table->string('order_status')->nullable();
            $table->string('transaction_id')->nullable();
            $table->integer('payment_amt_cents');
            $table->integer('ship_charged_cents')->nullable();
            $table->integer('ship_cost_cents')->nullable();
            $table->integer('subtotal_cents');
            $table->integer('total_cents');
            $table->string('shipper_name')->nullable();
            $table->dateTime('payment_date');
            $table->dateTime('shipped_date');
            $table->string('tracking_number');
            $table->integer('tax_total_cents');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
