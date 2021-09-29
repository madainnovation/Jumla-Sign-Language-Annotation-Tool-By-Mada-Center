<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParameterFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameter_forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId("parameter_id")
                ->constrained()
            ->onDelete("cascade")
            ->onUpdate("cascade");
            $table->string("label");
            $table->string("name");
            $table->string("type");
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
        Schema::dropIfExists('parameter_forms');
    }
}
