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
        Schema::create('user_profiles', function (Blueprint $table) {
            // $table->id();

            $table->uuid('id')->primary();

            $table->date('birthdate')->nullable();
            $table->string('ethnic')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->boolean('is_alcoholic')->nullable();
            $table->boolean('is_smoker')->nullable();
            $table->double('weight')->nullable();
            $table->double('height')->nullable();
            $table->boolean('is_tense')->nullable(); // hypo ou hyper tendu
            $table->enum('diabetes_type', ['type1', 'type2', 'type3'])->nullable();
            $table->date('discover_date')->nullable();
            $table->date('start_treatment_date')->nullable();
            $table->string('treatment_type')->nullable();
            $table->string('physic_activities')->nullable();
            $table->integer('pregnancies')->nullable();
            $table->string('job')->nullable();

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
        Schema::dropIfExists('user_profiles');
    }
};
