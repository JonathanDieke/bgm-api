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
        Schema::create('meals', function (Blueprint $table) {
            // $table->id();
            $table->uuid("id")->primary();
            $table->enum('type', ['first_breakfast', 'breakfast', 'dinner']);
            $table->smallInteger("hour", unsigned:true);
            $table->decimal("glycemia_before", unsigned:true);
            $table->decimal("glycemia_after", unsigned:true);
            $table->text("content");

            $table->foreignUuid("daily_data_id");

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meals');
    }
};
