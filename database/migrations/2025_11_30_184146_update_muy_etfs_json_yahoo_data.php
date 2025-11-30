<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('my_e_t_f_s', function (Blueprint $table) {
            $table->json('yahoo')->nullable();
            $table->timestamp('yahoo_updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('my_e_t_f_s', function (Blueprint $table) {
            $table->dropColumn('yahoo');
            $table->dropColumn('yahoo_updated_at');
        });
    }
};
