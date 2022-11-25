<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{

    const INSERT_DATA = [
        [
            'name' => 'Porções',
            'position' => 1
        ],
        [
            'name' => 'Cervejas',
            'position' => 2
        ],
        [
            'name' => 'Chopp',
            'position' => 3
        ],
        [
            'name' => 'Drinks',
            'position' => 4
        ],
        [
            'name' => 'Bebidas',
            'position' => 5
        ],
        [
            'name' => 'Outros',
            'position' => 6
        ],
    ];
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('product_type', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->tinyInteger('position');

            $table->timestamps();
        });

        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('price');
            $table->integer('promotional_price')->nullable();
            $table->tinyInteger('position')->nullable();


            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign('type_id')->references('id')->on('product_type');

            $table->timestamps();
        });

        foreach (self::INSERT_DATA as $insertData){

            $insert = new \App\Models\ProductType($insertData);
            $insert->save();
        }

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('product_type');
        Schema::dropIfExists('product');

        Schema::enableForeignKeyConstraints();
    }
}
