<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\Gender;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(TBL_CHARACTER, function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            // User info
            $table->string('nickname', 255)->unique();
            $table->text('bio')->nullable();
            $table->string('avatar', 255);
            $table->tinyInteger('gender')->unsigned()->default(Gender::Male)->nullable()->comment('0: Male; 1: Female');
            $table->datetime('dob')->nullable();
            $table->string('address', 255)->nullable();

            // Training
            $table->unsignedInteger('level');
            $table->unsignedInteger('year');

            // Stat
            $table->integer('intelligence')->default(0);
            $table->integer('strength')->default(0);
            $table->integer('vitality')->default(0);
            $table->integer('dexterity')->default(0);
            $table->integer('exp_per_second')->default(0);
            $table->integer('gold_per_second')->default(0);
            $table->integer('exp')->default(0);
            $table->integer('gold')->default(0);
            $table->integer('life_steal')->default(0);
            $table->integer('armor_break')->default(0);
            $table->integer('critical_rate')->default(0);
            $table->integer('critical_damage')->default(0);

            // Activities
            $table->datetime('last_login')->nullable();
            $table->datetime('last_logout')->nullable();
            $table->string('agent', 255)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(TBL_CHARACTER);
    }
}
