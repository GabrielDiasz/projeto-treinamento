<?php

use App\Models\Cliente;
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
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('cliente_id')->nullable();

            $table->foreign('cliente_id')
                ->references('id')
                ->on('clientes')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
//                ->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendas');
    }
};
