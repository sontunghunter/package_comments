<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    private $_table = NULL;
    private $fileds = NULL;

    public function __construct() {
        $this->_table = 'comments';
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('comments');
        Schema::create('comments', function(Blueprint $table)
        {
            $table->increments('comment_id');
            $table->TEXT ('comment_content');
            $table->integer('comment_id_parrent');
            $table->integer('user_id');
            $table->timestamp('comment_date')->nullable();
            $table->integer('comment_status');
            $table->integer('comment_id');
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
