<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcels', function (Blueprint $table) {
            $table->id();
            $table->string('parcel_code')->nullable();
            $table->integer('parcel_type')->nullable();
            $table->integer('no_of_parcels')->nullable();
            $table->integer('deli_type')->nullable();
            $table->integer('from_branch_id')->nullable();
            $table->integer('to_branch_id')->nullable();
            $table->string('sender_name')->nullable();
            $table->integer('sender_id')->nullable();
            $table->string('receiver_name')->nullable();
            $table->string('receiver_phone_no')->nullable();
            $table->text('receiver_address')->nullable();
            $table->integer('deli_fee')->nullable();
            $table->text('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parcels');
    }
};
