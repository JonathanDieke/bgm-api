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
        Schema::create('sleeps', function (Blueprint $table) {
            // $table->id();
            $table->uuid("id")->primary();
            $table->smallInteger('start_hour', unsigned:true);
            $table->smallInteger('end_hour', unsigned:true);
            $table->decimal('glycemia_before', unsigned:true);
            $table->decimal('glycemia_after', unsigned:true);

            $table->foreignUuid("daily_data_id")
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
        Schema::dropIfExists('sleepings');
    }
};
