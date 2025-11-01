<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('input_gstins', function (Blueprint $table) {
            $table->id();
            $table->integer('sr_no')->nullable();
            $table->string('invoice_no')->nullable();
            $table->date('invoice_date')->nullable();
            $table->string('invoice_month')->nullable();
            $table->string('company')->nullable();
            $table->string('gst_no')->nullable();
            $table->decimal('invoice_amount', 10, 2)->nullable();
            $table->decimal('gst_amount', 10, 2)->nullable();
            $table->decimal('cgst', 10, 2)->nullable();
            $table->decimal('sgst', 10, 2)->nullable();
            $table->string('remark')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('input_gstins');
    }
};
