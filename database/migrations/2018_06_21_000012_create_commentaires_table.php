<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentairesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'commentaires';

    /**
     * Run the migrations.
     * @table commentaires
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('email', 45);
            $table->string('name',45);
            $table->string('subject',60);
            $table->text('contenu');
            $table->unsignedInteger('users_id')->nullable();
            $table->unsignedInteger('articles_id');
            $table->unsignedInteger('validation');
            $table->softDeletes();
            $table->timestamps();

            $table->index(["articles_id"], 'fk_commentaires_articles1_idx');

            $table->index(["users_id"], 'fk_commentaires_users1_idx');


            $table->foreign('users_id', 'fk_commentaires_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('articles_id', 'fk_commentaires_articles1_idx')
                ->references('id')->on('articles')
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
