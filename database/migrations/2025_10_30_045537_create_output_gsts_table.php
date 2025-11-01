<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('output_gsts', function (Blueprint $table) {
            $table->id();
            $table->integer('sl_no')->nullable();
            $table->string('invoice_no')->nullable();
            $table->date('invoice_date')->nullable();
            $table->string('invoice_month')->nullable();
            $table->string('cust_name')->nullable();
            $table->string('company')->nullable();
            $table->string('comp')->nullable();
            $table->decimal('invoice_amount', 10, 2)->nullable();
            $table->decimal('gst_amount', 10, 2)->nullable();
            $table->boolean('tds_deduction')->default(false);
            $table->boolean('payment_status')->default(false);
            $table->string('gst_no')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('output_gsts');
    }
};
