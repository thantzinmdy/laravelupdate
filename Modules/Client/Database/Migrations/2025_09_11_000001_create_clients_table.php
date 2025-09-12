<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Enums\Table;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Table::CLIENT, function (Blueprint $table) {
            $table->id();
            $table->string('main_code')->nullable();
            $table->string('sub_code')->nullable();
            $table->date('filling_date')->nullable();
            $table->string('trademark_name')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('tm_types')->nullable();
            $table->string('class')->nullable();
            $table->string('application_number')->nullable();
            $table->text('owner_address')->nullable();
            $table->string('owner_phone')->nullable();
            $table->string('agent_name')->nullable();
            $table->string('local_mark')->nullable();
            $table->string('foreign_mark')->nullable();
            $table->text('remark')->nullable();
            $table->timestamp('updated_at');
            $table->timestamp('created_at')->useCurrent();
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
        Schema::dropIfExists(Table::CLIENT);
    }
};