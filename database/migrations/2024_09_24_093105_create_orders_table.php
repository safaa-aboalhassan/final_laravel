<?php

use App\Models\Food;
use App\Models\Table;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
    $table->id();
    $table->bigInteger('order_number');
    $table->foreignIdFor(Food::class);
    $table->foreignIdFor(Table::class);
    $table->integer('quantity');
    $table->decimal('price', 8, 2);  // Price of individual food item
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
