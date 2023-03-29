<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetalleVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {{
        Schema::create('detalleventa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_venta");
            $table->foreign("id_venta")
                ->references("id")
                ->on("ventas")
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $table->string("id_reporte");
            $table->string("cantidad");
            $table->string("precio");
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
        Schema::dropIfExists('detalleventa');
    }
}