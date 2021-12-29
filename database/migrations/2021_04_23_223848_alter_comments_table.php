<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('comments', function (Blueprint $table) {
        //     $table->id();
        //     $table->bigInteger('user_id')->unsigned()->index();
        //     $table->bigInteger('object_id')->unsigned()->index();
        //     $table->text('opinion');
        //     $table->timestamps('created_at')->default('CURRENT_TIMESTAMP');
        //     $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        //     $table->foreign('object_id')->references('id')->on('products')->onDelete('cascade');
            
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
