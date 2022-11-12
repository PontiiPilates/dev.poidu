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

            $table->string('title')->nullable()->comment('Заголовок');
            $table->string('url')->nullable()->comment('Ссылка на источник');
            $table->string('logo')->nullable()->comment('Логотип организатора');

            $table->string('participation')->nullable()->comment('Форма участия для фронтенда');
            $table->integer('price')->nullable()->comment('Стоимость');

            $table->timestamp('begin')->nullable('Дата и время начала');
            $table->char('date', 16)->nullable()->comment('Дата начала для фронтенда');
            $table->char('time', 16)->nullable()->comment('Время начала для фронтенда');

            $table->integer('status')->nullable()->comment('Статус публикации');

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
