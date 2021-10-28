<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('category', 20);
            $table->string('title', 50);
            $table->string('slug', 50);
            $table->string('author', 20);
            $table->text('body');
            $table->string('exerpt', 200);
            $table->string('thumbnail');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
