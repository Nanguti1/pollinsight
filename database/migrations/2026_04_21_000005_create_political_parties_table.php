<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('political_parties', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('abbreviation', 20)->nullable();
            $table->timestamps();
        });

        Schema::table('aspirants', function (Blueprint $table) {
            $table->foreignId('political_party_id')->nullable()->after('party')->constrained('political_parties')->nullOnDelete();
        });

        $this->backfillPoliticalParties();
    }

    public function down(): void
    {
        Schema::table('aspirants', function (Blueprint $table) {
            $table->dropConstrainedForeignId('political_party_id');
        });

        Schema::dropIfExists('political_parties');
    }

    private function backfillPoliticalParties(): void
    {
        $partyNames = DB::table('aspirants')
            ->select('party')
            ->whereNotNull('party')
            ->where('party', '!=', '')
            ->distinct()
            ->pluck('party');

        foreach ($partyNames as $partyName) {
            $partyId = DB::table('political_parties')->insertGetId([
                'name' => $partyName,
                'abbreviation' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('aspirants')
                ->where('party', $partyName)
                ->update(['political_party_id' => $partyId]);
        }
    }
};
