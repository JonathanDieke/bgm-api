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
        Schema::create('insulins', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->enum('type', ["oral", "injection"]);
            $table->string('mark');
            $table->smallInteger('hour');
            $table->decimal('glycemia');

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
        Schema::dropIfExists('insulins');
    }
};
