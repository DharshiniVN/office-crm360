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
        Schema::create('digital_marketing_campaigns', function (Blueprint $table) {
    $table->id();
    $table->string('category');
    $table->integer('srNo');
    $table->string('closerMonth')->nullable();
    $table->date('closerDate')->nullable();
    $table->string('clientName');
    $table->string('projectName');
    $table->string('businessCategory')->nullable();
    $table->string('domainName')->nullable();
    $table->string('professionalEmailID')->nullable();
    $table->integer('noOfEmailID')->nullable();
    $table->string('server')->nullable();
    $table->string('clientMob')->nullable();
    $table->string('clientGmailID')->nullable();
    $table->string('altEmailID')->nullable();
    $table->string('clientLocation')->nullable();
    $table->date('clientDOB')->nullable();
    $table->string('campaign')->nullable();
    $table->string('bdm')->nullable();
    $table->string('project')->nullable();
    $table->string('postingFrequency')->nullable();
    $table->integer('totalPost')->nullable();
    $table->string('mailID')->nullable();
    $table->string('clientNumber')->nullable();
    $table->string('projectLead')->nullable();
    $table->string('ads')->nullable();
    $table->string('startingMonth')->nullable();
    $table->date('billingDate')->nullable();
    $table->date('projectStartingDt')->nullable();
    $table->date('projectClosingDt')->nullable();
    $table->text('remark')->nullable();
    $table->decimal('clientCharges', 10, 2)->nullable();
    $table->decimal('initialPayment', 10, 2)->nullable();
    $table->decimal('secondPayment', 10, 2)->nullable();
    $table->decimal('remainingPayment', 10, 2)->nullable();
    $table->string('projectStatus')->nullable();
    $table->string('clientNo')->nullable();
    $table->string('mailID2')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('digital_marketing_campaigns');
    }
};
