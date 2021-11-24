<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(TBL_SET, function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('course_id');
            $table->string('name');
            $table->unsignedInteger('gold');
            $table->unsignedInteger('exp');
            $table->unsignedInteger('item_type')->comment('Sẽ lưu số lượng loại item có thể đạt được. Item sẽ dựa theo level của người chơi để phát thưởng.');
            $table->unsignedInteger('item_amount')->comment('Sẽ lưu số lượng item có thể đạt được.');
            $table->unsignedInteger('waifu_id');
            $table->unsignedInteger('waifu_fragment_amount');
            $table->string('created_by');
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists(TBL_SET);
    }
}
