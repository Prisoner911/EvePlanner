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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->integer('ApplicationNo');
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('email');
            $table->string('PhoneNo');
            $table->string('EventType');
            $table->string('Venue');
            $table->date('EventDate');
            $table->string('GuestsAmount');
            $table->string('CommunicationMethod');
            $table->time('StartTime');
            $table->time('EndTime');
            $table->json('Services')->nullable();
            $table->string('AdditionalComments');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
