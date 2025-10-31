<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('billings', function (Blueprint $table) {
        $table->id();
        $table->string('invoice_no')->nullable();
        $table->string('client_name');
        $table->string('service_type')->nullable();
        $table->decimal('total_amount', 10, 2)->default(0);
        $table->date('due_date')->nullable();
        $table->string('payment_mode')->nullable(); // e.g. UPI, Cash, Bank
        $table->enum('payment_status', ['pending', 'completed', 'advance'])->default('pending');
        $table->enum('invoice_status', ['pending', 'accepted', 'rejected'])->default('pending');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billings');
    }
};
