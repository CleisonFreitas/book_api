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
        Schema::create('book_index', function (Blueprint $table) {
            $table->id()->comment('Unique ID of the index table');
            $table->string('title', 64)->comment('Title of the index from the book.');
            $table->smallInteger('page')->comment('Number of page that will works as a reference.');
            $table->unsignedBigInteger('parent_id')->comment('The parent or predecessor of the index.')->nullable();
            $table->unsignedBigInteger('book_id')->comment('Books whom the index belongs to.');
            $table->timestamps();
            $table->softDeletes('Moment or period when the index has been removed');

            $table->foreign('parent_id')
                ->references('id')
                ->on('book_index')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('book_id')
                ->references('id')
                ->on('books')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indices');
    }
};
