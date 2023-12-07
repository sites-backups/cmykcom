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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('slug',255);
            $table->string('image',255);
            $table->string('meta_tags',255)->nullable();
            $table->text('meta_description')->nullable();
            $table->integer('status')->comment('0=Deactive, 1=Active')->default(0);
            $table->integer('is_nav')->comment('0=No, 1=Yes')->default(0);
            $table->softDeletes();
            $table->unique(['name','slug','deleted_at']);
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
        Schema::dropIfExists('categories');
    }
};
