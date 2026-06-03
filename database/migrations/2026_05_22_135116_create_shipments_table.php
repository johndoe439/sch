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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();





            $table->string('tracking_number')->unique()->index();

            // Sender
            $table->string('sender_firstname');
            $table->string('sender_lastname');
            $table->string('sender_country');

            // Receiver
            $table->string('receiver_name');
            $table->string('receiver_email');
            $table->string('receiver_phone');
            $table->string('receiver_country');
            $table->text('receiver_address');

            // Package
            $table->string('package_name');
            $table->text('description')->nullable();
            $table->text('condition_message')->nullable();

            $table->decimal('amount', 10, 2);

            $table->date('dispatch_date');
            $table->date('delivery_date');

            $table->enum('status', ['processing', 'shipped', 'transit', 'delivered'])
                ->default('processing');

            $table->string('current_location')->nullable();

            // Multiple Images as JSON - Laravel 11 Compatible
            $table->json('package_images')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
