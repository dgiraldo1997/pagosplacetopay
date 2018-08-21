<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('payers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('document',12);
            $table->string('documentType',3);
            $table->string('firstName', 60)->nullable();
            $table->string('lastName',60)->nullable();
            $table->string('company',60)->nullable();
            $table->string('emailAddress', 80)->nullable();
            $table->string('address',100)->nullable();
            $table->string('city',50)->nullable();
            $table->string('province', 50)->nullable();
            $table->string('country',2)->nullable();
            $table->string('phone',30)->nullable();
            $table->string('mobile', 30)->nullable();
            $table->string('postalCode', 30)->nullable();
            $table->timestamps();
        });
        Schema::create('buyers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('document',12);
            $table->string('documentType',3);
            $table->string('firstName', 60)->nullable();
            $table->string('lastName',60)->nullable();
            $table->string('company',60)->nullable();
            $table->string('emailAddress', 80)->nullable();
            $table->string('address',100)->nullable();
            $table->string('city',50)->nullable();
            $table->string('province', 50)->nullable();
            $table->string('country',2)->nullable();
            $table->string('phone',30)->nullable();
            $table->string('mobile', 30)->nullable();
            $table->string('postalCode', 30)->nullable();
            $table->timestamps();
        });

        Schema::create('shippings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('document',12);
            $table->string('documentType',3);
            $table->string('firstName', 60)->nullable();
            $table->string('lastName',60)->nullable();
            $table->string('company',60)->nullable();
            $table->string('emailAddress', 80)->nullable();
            $table->string('address',100)->nullable();
            $table->string('city',50)->nullable();
            $table->string('province', 50)->nullable();
            $table->string('country',2)->nullable();
            $table->string('phone',30)->nullable();
            $table->string('mobile', 30)->nullable();
            $table->string('postalCode', 30)->nullable();
            $table->timestamps();
        });

        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bankCode',4);
            $table->string('bankInterface',1);
            $table->string('returnURL', 255)->nullable();
            $table->string('reference',32)->nullable();
            $table->string('description',255)->nullable();
            $table->string('language', 2)->nullable();
            $table->string('currency',3)->nullable();
            $table->double('totalAmount',15,8)->nullable();
            $table->double('taxAmount', 15,8)->nullable();
            $table->double('devolutionBase',15,8)->nullable();
            $table->double('tipAmount',15,8)->nullable();
            $table->integer('payer')->unsigned()->nullable();
            $table->foreign('payer')->references('id')->on('payers');
            $table->integer('buyer')->unsigned()->nullable();
            $table->foreign('buyer')->references('id')->on('buyers');
            $table->integer('shipping')->unsigned()->nullable();
            $table->foreign('shipping')->references('id')->on('shippings');
            $table->string('ipAddress', 15)->nullable();
            $table->string('userAgent', 255)->nullable();
            $table->string('name', 30)->nullable();
            $table->string('value', 128)->nullable();
            $table->timestamps();
        });

        Schema::create('transactionsresult', function (Blueprint $table) {
            $table->increments('id');
            $table->string('returnCode');
            $table->string('bankURL');
            $table->string('trazabilityCode')->nullable();
            $table->integer('transactionCycle')->nullable();
            $table->integer('transactionID')->nullable();
            $table->string('sessionID')->nullable();
            $table->string('bankCurrency')->nullable();
            $table->double('bankFactor')->nullable();
            $table->integer('responseCode')->nullable();
            $table->string('responseReasonCode')->nullable();
            $table->string('responseReasonText')->nullable();
            $table->integer('transaction')->unsigned()->nullable();
            $table->foreign('transaction')->references('id')->on('transactions');
            $table->timestamps();
        });

        Schema::create('transactionsinformation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transactionID')->nullable();
            $table->string('sessionID')->nullable();
            $table->string('reference')->nullable();
            $table->string('requestDate')->nullable();
            $table->string('bankProcessDate')->nullable();
            $table->boolean('onTest')->nullable();
            $table->string('returnCode')->nullable();
            $table->string('trazabilityCode')->nullable();
            $table->integer('transactionCycle')->nullable();
            $table->string('transactionState')->nullable();
            $table->integer('responseCode')->nullable();
            $table->string('responseReasonCode')->nullable();
            $table->string('responseReasonText')->nullable();
            $table->integer('transactionresult')->unsigned()->nullable();
            $table->foreign('transactionresult')->references('id')->on('transactionsresult');
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
        Schema::drop('payers');
        Schema::drop('buyers');
        Schema::drop('shippings');
        Schema::drop('transactions');
        Schema::drop('transactionsresult');
        Schema::drop('transactionsinformation');
    }
}
