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
        Schema::create('daily_datas', function (Blueprint $table) {
            // $table->id();
            $table->uuid("id")->primary();
            $table->smallInteger('nb_hypoglycemia', unsigned:true)->default(0);
            $table->smallInteger('nb_hyperglycemia', unsigned:true)->default(0);
            $table->boolean('is_sick')->default(0);

            $table->foreignUuid('user_id')
                    ->constrained()
                    ->restrictOnDelete();

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
        Schema::dropIfExists('daily_datas');
    }
};
