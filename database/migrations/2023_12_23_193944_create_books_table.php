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
        Schema::create('books', function (Blueprint $table) {
            $table->id()->comment('Unique ID of books table');
            $table->string('title', 64)->comment('Title or name of the book');
            $table->unsignedBigInteger('publisher_id')->comment('ID of the author of the book');
            $table->timestamps();
            $table->softDeletes('Moment or period when the books has been removed');

            $table->foreign('publisher_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
