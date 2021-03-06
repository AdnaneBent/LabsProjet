<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'articles';

    /**
     * Run the migrations.
     * @table articles
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('titre', 45);
            $table->text('contenu');
            $table->string('image', 45);
            $table->unsignedInteger('users_id');
            $table->unsignedInteger('categories_id');
            $table->unsignedInteger('validation');
            $table->softDeletes();
            $table->timestamps();

            $table->index(["users_id"], 'fk_articles_users1_idx');


            $table->foreign('users_id', 'fk_articles_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('users_id', 'fk_articles_categories1_idx')
            ->references('id')->on('categories')
            ->onDelete('no action')
            ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
