<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default(NULL)->comment('Заголовок');
            $table->string('url')->default(NULL)->comment('Ссылка на источник');
            $table->json('tags')->default(NULL)->comment('Теги');
            $table->string('payment')->default(NULL)->comment('Форма участия');
            $table->string('logo')->default(NULL)->comment('Имя файла логотипа организатора');

//            $table->integer('cost')->default(NULL)->comment('Стоимость мероприятя');
//            $table->integer('free')->default(NULL)->comment('Мероприятие бесплатно');
//            $table->integer('donate')->default(NULL)->comment('За донат');

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
        Schema::dropIfExists('events');
    }
}
