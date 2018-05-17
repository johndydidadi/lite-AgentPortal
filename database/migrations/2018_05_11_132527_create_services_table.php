<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('service');
            $table->enum('payment_type',['subscription', 'one_time_payment']);
            $table->decimal('otp_price', 13,2)->default(0);
            $table->decimal('annual_price', 13,2)->default(0);
            $table->decimal('semi_quarterly_price', 13,2)->default(0);
            $table->decimal('quarterly_price', 13,2)->default(0);
            $table->decimal('monthly_price', 13,2)->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
