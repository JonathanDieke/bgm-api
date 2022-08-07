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
        Schema::create('daily_data', function (Blueprint $table) {
            // $table->id();
            $table->uuid("id")->primary()->unique();
            $table->smallInteger('nb_hypoglycemia', unsigned:true)->default(0);
            $table->smallInteger('nb_hyperglycemia', unsigned:true)->default(0);
            $table->boolean('is_sick')->default(0);

            $table->foreignUuid('user_id');

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
        Schema::dropIfExists('daily_data');
    }
};
