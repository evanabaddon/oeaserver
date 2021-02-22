<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prodis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('gambar');
            $table->string('kampus');
            $table->string('jenjang');
            $table->text('desc');
            $table->text('sibel');
            $table->integer('biaya');
            $table->integer('id_kategori');
            $table->double('rate');
            $table->double('dis');
            $table->string('types');
            $table->string('types');
            $table->softDeletes();
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
        Schema::dropIfExists('prodis');
    }
}