<?php

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
        Schema::create('graphic_projects', function (Blueprint $table) {
    $table->id();
    $table->string('category')->nullable();
    $table->integer('sr_no')->nullable();
    $table->string('project')->nullable();
    $table->string('campaign')->nullable();
    $table->string('project_name')->nullable();
    $table->string('domain_name')->nullable();
    $table->string('client_name')->nullable();
    $table->string('client_number')->nullable();
    $table->string('bdm')->nullable();
    $table->string('assigned_person')->nullable();
    $table->string('tl')->nullable();
    $table->string('project_month')->nullable();
    $table->date('project_starting_date')->nullable();
    $table->date('project_closing_date')->nullable();
    $table->text('remark')->nullable();
    $table->decimal('client_charges', 10, 2)->nullable();
    $table->decimal('initial_payment', 10, 2)->nullable();
    $table->decimal('second_payment', 10, 2)->nullable();
    $table->decimal('remaining_payment', 10, 2)->nullable();
    $table->string('project_status')->nullable();
    $table->string('client_no')->nullable();
    $table->string('mail_id')->nullable();
    $table->string('amc')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('graphics');
    }
};
