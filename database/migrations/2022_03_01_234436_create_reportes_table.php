<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        {
            Schema::create('reportes', function (Blueprint $table) {
                $table->id();
                $table->string("nombre_area");
                $table->string("nombre_cliente");
                $table->string("nombre_tecnico");
                $table->string("reporte");
                $table->string("estado");
                $table->string("feyhora");
                $table->string("feyhorafinal");
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reportes');
    }
}
