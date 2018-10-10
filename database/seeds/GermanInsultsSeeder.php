<?php

use Illuminate\Database\Seeder;
use App\Models\Text;

class GermanInsultsSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $raw = file_get_contents(__DIR__."/data/german_insults.txt");
        $a = explode("\n", $raw);
        //$a = array_map("trim", $a);
        //$a = array_filter($a, function ($v) { return $v !== ""; });
        foreach ($a as $v) {
            if ($v === "") continue;
            if (Text::where("text", trim($v))->count() > 0) continue;
            Text::create([
                "text" => trim($v)
            ]);
        }
    }
}
