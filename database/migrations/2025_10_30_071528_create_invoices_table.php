<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('pi')->nullable();
            $table->string('transport_mode')->nullable();
            $table->date('invoice_date')->nullable();
            $table->string('vehicle_number')->nullable();
            $table->string('reverse_charge')->default('N');
            $table->string('state')->nullable();
            $table->string('state_code')->nullable();
            $table->string('place_of_supply')->nullable();

            // Bill To
            $table->string('bill_to_name')->nullable();
            $table->text('bill_to_address')->nullable();
            $table->string('bill_to_gstin')->nullable();
            $table->string('bill_to_state')->nullable();
            $table->string('bill_to_code')->nullable();

            // Ship To
            $table->string('ship_to_name')->nullable();
            $table->text('ship_to_address')->nullable();
            $table->string('ship_to_gstin')->nullable();
            $table->string('ship_to_state')->nullable();
            $table->string('ship_to_code')->nullable();

            // Bank Details
            $table->string('beneficiary_name')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('bank_ifsc')->nullable();
            $table->string('pan_number')->nullable();

            // Tax Details
            $table->decimal('total_before_tax', 10, 2)->nullable();
            $table->decimal('igst_percent', 5, 2)->nullable();
            $table->decimal('total_tax_amount', 10, 2)->nullable();
            $table->decimal('round_off', 10, 2)->nullable();
            $table->decimal('total_after_tax', 10, 2)->nullable();
            $table->string('gst_reverse_charge')->nullable();

            // Additional Info
            $table->string('invoice_status')->default('Pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
