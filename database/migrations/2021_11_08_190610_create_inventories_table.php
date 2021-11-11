<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Product;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class);
            $table->integer('quantity');
            $table->string('color');
            $table->string('size');
            $table->decimal('weight');
            $table->integer('price_cents');
            $table->integer('sale_price_cents');
            $table->integer('cost_cents');
            $table->string('sku');
            $table->decimal('length');
            $table->decimal('width');
            $table->decimal('height');
            $table->text('note');
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
        Schema::dropIfExists('inventories');
    }
}
