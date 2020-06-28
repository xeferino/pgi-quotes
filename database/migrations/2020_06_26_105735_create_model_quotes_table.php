<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('persons_id')->unsigned()->index();
            $table->string('title');
            $table->text('description');
            $table->datetime('date');
            $table->text('observation')->default(NULL)->nullable($value=true);
            $table->integer('status');
            $table->timestamps();
            $table->foreign('persons_id')
                  ->references('id')
                  ->on('persons')
                  ->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotes');
    }
}
