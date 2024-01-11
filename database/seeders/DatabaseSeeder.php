<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Chart;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Hapus data sebelumnya jika ada
        DB::table('charts')->delete();

        // Tambahkan data dummy
        Chart::create(['label' => 'Label 1', 'value' => 12]);
        Chart::create(['label' => 'Label 2', 'value' => 19]);
        Chart::create(['label' => 'Label 3', 'value' => 3]);
    }
}
