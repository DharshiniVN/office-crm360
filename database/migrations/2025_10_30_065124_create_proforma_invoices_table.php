<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('proforma_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('pi_number');
            $table->string('transport_mode')->nullable();
            $table->date('invoice_date')->nullable();
            $table->string('vehicle_number')->nullable();
            $table->string('reverse_charge')->nullable();
            $table->string('state')->nullable();
            $table->string('state_code')->nullable();
            $table->string('place_of_supply')->nullable();

            // Bill to
            $table->string('bill_name')->nullable();
            $table->text('bill_address')->nullable();
            $table->string('bill_gstin')->nullable();
            $table->string('bill_state')->nullable();
            $table->string('bill_code')->nullable();

            // Ship to
            $table->string('ship_name')->nullable();
            $table->text('ship_address')->nullable();
            $table->string('ship_gstin')->nullable();
            $table->string('ship_state')->nullable();
            $table->string('ship_code')->nullable();

            // Bank details
            $table->string('beneficiary_name')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('ifsc')->nullable();
            $table->string('pan')->nullable();

            // Tax details
            $table->decimal('total_before_tax', 15, 2)->nullable();
            $table->decimal('igst_percent', 5, 2)->nullable();
            $table->decimal('total_tax_amount', 15, 2)->nullable();
            $table->decimal('round_off', 15, 2)->nullable();
            $table->decimal('total_after_tax', 15, 2)->nullable();
            $table->decimal('gst_reverse_charge', 15, 2)->nullable();

            // Status
            $table->string('proforma_status')->default('Pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('proforma_invoices');
    }
};
