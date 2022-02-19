<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookLoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_loan', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->foreignId('book_id')
                ->constrained('books')
                ->references('id');
            $table->foreignId('loan_id')
                ->constrained('loans')
                ->references('id');

            $table->primary(['book_id', 'loan_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_loan');
    }
}
