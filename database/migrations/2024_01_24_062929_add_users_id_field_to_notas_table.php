<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('notas', function (Blueprint $table) {
            //
            $table->foreignId('users_id')->after('updated_at')->constrained()->onDelete('cascade')->onUpadte('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notas', function (Blueprint $table) {
            //
            $table->dropForeign('notas_users_id_foreign');
            $table->dropColumn('users_id');
        });
    }
};
