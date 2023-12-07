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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('prod_title',255);
            $table->string('slug',255);
            $table->text('short_description');
            $table->longText('body');
            $table->integer('status')->comment('0=Deactive, 1=Active')->default(0);
            $table->integer('is_recommend')->comment('0=No, 1=Yes')->default(0);
            $table->integer('is_nav')->comment('0=No, 1=Yes')->default(0);
            $table->softDeletes();
            $table->unique(['prod_title','slug','deleted_at']);
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
        Schema::dropIfExists('products');
    }
};
