<?php

use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
            DB::table('stores')->insert([
                'id' => 1,
                'name' => 'セブンイレブン',
                'overview' => '圧倒的高品質。値段が他店より高い,若しくは量が少ない分とても高品質な商品が多い。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                
                
            ]);
    
            DB::table('stores')->insert([
                'id' => 2,
                'name' => 'ファミリーマート',
                'overview' => 'とても無難。セブンイレブンに比べ質が少し落ちる分,量がある商品が多い。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                
                
            ]);
    
            DB::table('stores')->insert([
                'id' => 3,
                'name' => 'ローソン',
                'overview' => 'コンビニ菓子の中では良くも悪くも目立たない。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                
            ]);
    
            DB::table('stores')->insert([
                'id' => 4,
                'name' => 'まいばすけっと',
                'overview' => '四種の店の中で唯一コンビニではない枠。この店の一番の強みは何といっても安',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                
            ]);
    

    }
}
