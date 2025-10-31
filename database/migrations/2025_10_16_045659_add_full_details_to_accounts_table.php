<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFullDetailsToAccountsTable extends Migration
{
    public function up()
{
    Schema::table('accounts', function (Blueprint $table) {
        //if (!Schema::hasColumn('accounts', 'gmail1')) {
          //  $table->string('gmail1')->nullable();
       // }
        if (!Schema::hasColumn('accounts', 'gmail2')) {
            $table->string('gmail2')->nullable();
        }
        if (!Schema::hasColumn('accounts', 'websiteUrl')) {
            $table->string('websiteUrl')->nullable();
        }
        if (!Schema::hasColumn('accounts', 'appUrl')) {
            $table->string('appUrl')->nullable();
        }
        if (!Schema::hasColumn('accounts', 'domainname')) {
            $table->string('domainname')->nullable();
        }
        if (!Schema::hasColumn('accounts', 'domainBookingDate')) {
            $table->date('domainBookingDate')->nullable();
        }
        if (!Schema::hasColumn('accounts', 'domainPlace')) {
            $table->string('domainPlace')->nullable();
        }
        if (!Schema::hasColumn('accounts', 'server')) {
            $table->string('server')->nullable();
        }
        if (!Schema::hasColumn('accounts', 'mailId')) {
            $table->string('mailId')->nullable();
        }
        if (!Schema::hasColumn('accounts', 'gsuite')) {
            $table->boolean('gsuite')->default(false);
        }
        if (!Schema::hasColumn('accounts', 'webmail')) {
            $table->boolean('webmail')->default(false);
        }
        if (!Schema::hasColumn('accounts', 'location')) {
            $table->string('location')->nullable();
        }
        if (!Schema::hasColumn('accounts', 'gpage')) {
            $table->string('gpage')->nullable();
        }
        if (!Schema::hasColumn('accounts', 'projectCost')) {
            $table->decimal('projectCost', 10, 2)->nullable();
        }
        if (!Schema::hasColumn('accounts', 'finalCost')) {
            $table->decimal('finalCost', 10, 2)->nullable();
        }
        if (!Schema::hasColumn('accounts', 'advPayment')) {
            $table->decimal('advPayment', 10, 2)->nullable();
        }
        if (!Schema::hasColumn('accounts', 'advDate')) {
            $table->date('advDate')->nullable();
        }
        if (!Schema::hasColumn('accounts', 'pay2Date')) {
            $table->date('pay2Date')->nullable();
        }
        if (!Schema::hasColumn('accounts', 'txn2')) {
            $table->string('txn2')->nullable();
        }
        if (!Schema::hasColumn('accounts', 'txn3')) {
            $table->string('txn3')->nullable();
        }
        if (!Schema::hasColumn('accounts', 'extra')) {
            $table->string('extra')->nullable();
        }
        if (!Schema::hasColumn('accounts', 'renewalAmount')) {
            $table->decimal('renewalAmount', 10, 2)->nullable();
        }
        if (!Schema::hasColumn('accounts', 'renewalDate')) {
            $table->date('renewalDate')->nullable();
        }
        if (!Schema::hasColumn('accounts', 'birthday')) {
            $table->date('birthday')->nullable();
        }
        if (!Schema::hasColumn('accounts', 'anniversary')) {
            $table->date('anniversary')->nullable();
        }
    });
}

    public function down()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->dropColumn([
                'gmail1','gmail2','websiteUrl','appUrl','domainname','domainBookingDate','domainPlace','server','mailId',
                'gsuite','webmail','location','gpage','projectCost','finalCost','advPayment','advDate',
                'pay2Date','txn2','txn3','extra','renewalAmount','renewalDate','birthday','anniversary',
                
            ]);
        });
    }
}