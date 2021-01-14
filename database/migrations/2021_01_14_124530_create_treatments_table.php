<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->string('amount')->default("0-1");
            // $table->foreignId('menu_id');
            $table->foreignId('disease_id');
            $table->text('fertilizer')->nullable();
            $table->text('pesticides')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('disease_id')->references('id')->on('diseases')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('treatments');
    }
}
