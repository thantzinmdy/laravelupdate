<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\Table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table(Table::CLIENT, function (Blueprint $table) {
            // Drop the old agent_name column
            $table->dropColumn('agent_name');
            
            // Add the new agent_id column with foreign key
            $table->unsignedInteger('agent_id')->nullable()->after('owner_phone');
            $table->foreign('agent_id')->references('id')->on(Table::AGENT)->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(Table::CLIENT, function (Blueprint $table) {
            // Drop foreign key and agent_id column
            $table->dropForeign(['agent_id']);
            $table->dropColumn('agent_id');
            
            // Re-add the agent_name column
            $table->string('agent_name')->nullable()->after('owner_phone');
        });
    }
};
