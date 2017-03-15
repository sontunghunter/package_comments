<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    private $_table = NULL;
    private $fileds = NULL;

    public function __construct() {
        $this->_table = 'posts';
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('posts');
        Schema::create('posts', function(Blueprint $table)
        {
            $table->increments('post_id');
            $table->TEXT ('post_content');
            $table->integer('post_id');
            $table->timestamp('post_date')->nullable();
            $table->integer('post_title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
