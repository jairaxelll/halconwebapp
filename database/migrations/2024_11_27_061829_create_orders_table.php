<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();  // Auto-incrementing primary key
            $table->string('customer_name');
            $table->string('invoice_number')->unique();
            $table->string('customer_number')->unique();
            $table->text('fiscal_data');
            $table->string('delivery_address');
            $table->text('notes')->nullable();
            $table->enum('status', ['Ordered', 'In process', 'In route', 'Delivered'])->default('Ordered');
            $table->timestamps(); // Created_at and updated_at timestamps
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