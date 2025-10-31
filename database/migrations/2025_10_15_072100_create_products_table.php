<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->year('closer_year')->nullable();
            $table->date('closer_date')->nullable();
            $table->string('client_name')->nullable();
            $table->string('client_mobile')->nullable();
            $table->string('client_gmail')->nullable();
            $table->string('project_name')->nullable();
            $table->string('domain_name')->nullable();
            $table->string('domain_booking_place')->nullable();
            $table->date('domain_booking_date')->nullable();
            $table->year('domain_booking_year')->nullable();
            $table->string('professional_email')->nullable();
            $table->integer('no_of_email_id')->default(0);
            $table->string('alt_email')->nullable();
            $table->string('server')->nullable();
            $table->string('client_location')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->date('client_dob')->nullable();
            $table->string('campaign')->nullable();
            $table->string('bdm')->nullable();
            $table->string('frontend_dev')->nullable();
            $table->string('backend_dev')->nullable();
            $table->date('project_start_date')->nullable();
            $table->date('project_deadline')->nullable();
            $table->date('demo_date')->nullable();
            $table->date('project_closer_date')->nullable();
            $table->string('final_status')->nullable();
            $table->decimal('project_cost', 10, 2)->default(0);
            $table->decimal('with_gst', 10, 2)->default(0);
            $table->decimal('server_cost', 10, 2)->default(0);
            $table->decimal('email_cost', 10, 2)->default(0);
            $table->decimal('initial_payment', 10, 2)->default(0);
            $table->decimal('second_payment', 10, 2)->default(0);
            $table->decimal('remaining_payment', 10, 2)->default(0);
            $table->decimal('pending_payment', 10, 2)->default(0);
            $table->text('remark')->nullable();
            $table->string('project_status')->nullable();
            $table->string('amc')->nullable();
            $table->string('renewal_status', 20)->nullable();
            $table->string('renewal_month')->nullable();
            $table->date('renewal_date')->nullable();
            $table->integer('renewal_items')->default(0);
            $table->decimal('renewal_amount', 10, 2)->default(0);
            $table->text('renewal_remark')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
