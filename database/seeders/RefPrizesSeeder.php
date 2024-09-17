<?php

namespace Database\Seeders;

use App\Models\RefPrizes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RefPrizesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ref_prizes')->truncate();
        RefPrizes::query()->create([
          'name'=> 'Breakthrough Prizes',
          'frequency'=>'Tahunan',
          'bidang_id'=>1,
          'average'=>3000000,
          'link_web'=>'https://breakthroughprize.org/',
          'tingkat'=>1
        ]);
      RefPrizes::query()->create([
        'name'=> 'Tang Prize',
        'frequency'=>'Dua Tahunan',
        'bidang_id'=>1,
        'average'=>1330000,
        'link_web'=>'https://www.tang-prize.org/en/first.php',
        'tingkat'=>1
      ]);
      RefPrizes::query()->create([
        'name'=> 'Queen Elizabeth Prize for Engineering',
        'frequency'=>'Dua Tahunan',
        'bidang_id'=>1,
        'average'=>1322920,
        'link_web'=>'https://qeprize.org/winners/perc-solar- technology',
        'tingkat'=>1
      ]);
      RefPrizes::query()->create([
        'name'=> 'Nobel Prize',
        'frequency'=>'Tahunan',
        'bidang_id'=>1,
        'average'=>'USD 1,145,000',
        'link_web'=>'https://www.nobelprize.org/prizes/',
        'tingkat'=>1
      ]);
      RefPrizes::query()->create([
        'name'=> 'Millennium Technology Prize',
        'frequency'=>'Dua Tahunan',
        'bidang_id'=>1,
        'average'=>'USD 1,129,924',
        'link_web'=>'https://millenniumprize.org/',
        'tingkat'=>1
      ]);
      RefPrizes::query()->create([
        'name'=> 'Turing Award',
        'frequency'=>'Tahunan',
        'bidang_id'=>1,
        'average'=>'USD 1,000,000',
        'link_web'=>'https://www.forbes.com/sites/nicolemart in1/2019/03/27/turing-award-and-1- million-given-to-3-ai- pioneers/?sh=71e66d0a4784',
        'tingkat'=>1
      ]);
      RefPrizes::query()->create([
        'name'=> 'The Eric and Sheila Samson Prime Minister’s Prize',
        'frequency'=>'Tahunan',
        'bidang_id'=>1,
        'average'=>'USD 1,000,000',
        'link_web'=>'https://fuelchoicessummits.com/Award. aspx#:~:text=The%20Eric%20and%20 Sheila%20Samson,advancements%20t owards%20achieving%20this%20goal.',
        'tingkat'=>1
      ]);
      RefPrizes::query()->create([
        'name'=> 'Kavli Prize',
        'frequency'=>'Dua Tahunan',
        'bidang_id'=>1,
        'average'=>'USD 1,000,000',
        'link_web'=>'https://www.kavliprize.org/',
        'tingkat'=>1
      ]);
      RefPrizes::query()->create([
        'name'=> 'Crafoord Prize',
        'frequency'=>'Tahunan',
        'bidang_id'=>1,
        'average'=>'USD 918,607',
        'link_web'=>'https://www.crafoordprize.se/about-the- prize/the-crafoord-prize/',
        'tingkat'=>1
      ]);
      RefPrizes::query()->create([
        'name'=> 'Abel Prize',
        'frequency'=>'Tahunan',
        'bidang_id'=>1,
        'average'=>'USD 878,000',
        'link_web'=>'https://abelprize.no/page/history-abel-prize',
        'tingkat'=>1
      ]);
      RefPrizes::query()->create([
        'name'=> 'Charles Stark Draper Prize',
        'frequency'=>'Dua Tahunan',
        'bidang_id'=>1,
        'average'=>'USD 500,000',
        'link_web'=>'https://www.nae.edu/20681/DraperPrize',
        'tingkat'=>1
      ]);
      RefPrizes::query()->create([
        'name'=> 'Gruber Prizes',
        'frequency'=>'Tahunan',
        'bidang_id'=>1,
        'average'=>'USD 500,000',
        'link_web'=>'https://gruber.yale.edu/gruber-prizes',
        'tingkat'=>1
      ]);
      RefPrizes::query()->create([
        'name'=> 'Russ Prize',
        'frequency'=>'Dua Tahunan',
        'bidang_id'=>1,
        'average'=>'USD 500,000',
        'link_web'=>'https://www.ohio.edu/engineering/about /russ-prize',
        'tingkat'=>1
      ]);
      RefPrizes::query()->create([
        'name'=> 'Welch Award',
        'frequency'=>'Tahunan',
        'bidang_id'=>1,
        'average'=>'USD 500,000',
        'link_web'=>'https://welch1.org/awards/welch-award- in-chemistry',
        'tingkat'=>1
      ]);
      RefPrizes::query()->create([
        'name'=> 'Japan Prize',
        'frequency'=>'Tahunan',
        'bidang_id'=>1,
        'average'=>'USD 440,452',
        'link_web'=>'https://www.japanprize.jp/en/index.html',
        'tingkat'=>1
      ]);
      RefPrizes::query()->create([
        'name'=> 'King Faisal International Prize',
        'frequency'=>'Tahunan',
        'bidang_id'=>1,
        'average'=>'USD 260,000',
        'link_web'=>'https://www.kff.com/king-faisal-prize/',
        'tingkat'=>1
      ]);
      RefPrizes::query()->create([
        'name'=> 'Bower Award & Prize',
        'frequency'=>'Tahunan',
        'bidang_id'=>1,
        'average'=>'USD 250,000',
        'link_web'=>'https://www.fi.edu/en/awards/bower-award-prize-achievement-science',
        'tingkat'=>1
      ]);
      RefPrizes::query()->create([
        'name'=> 'Blavatnik Award',
        'frequency'=>'Tahunan',
        'bidang_id'=>1,
        'average'=>'USD 250,000',
        'link_web'=>'http://blavatnikawards.org/awards/national-awards/',
        'tingkat'=>1
      ]);
      RefPrizes::query()->create([
        'name'=> 'Lasker Award',
        'frequency'=>'Tahunan',
        'bidang_id'=>1,
        'average'=>'USD 250,000',
        'link_web'=>'https://www.statnews.com/2023/09/21/alphafold-developers-and-eye-scan-inventors-among-lasker-award-winners-for-2023/',
        'tingkat'=>1
      ]);
      RefPrizes::query()->create([
        'name'=> 'Eni Award',
        'frequency'=>'Tahunan',
        'bidang_id'=>1,
        'average'=>'USD 226,010',
        'link_web'=>'https://www.eni.com/en-IT/media/press-release/2023/07/pr-eni-eniaward-2023.html',
        'tingkat'=>1
      ]);
      RefPrizes::query()->create([
        'name'=> 'Tyler Prize',
        'frequency'=>'Tahunan',
        'bidang_id'=>1,
        'average'=>'USD 200,000',
        'link_web'=>'https://tylerprize.org/',
        'tingkat'=>1
      ]);
      RefPrizes::query()->create([
        'name'=> 'Stockholm Water Prize',
        'frequency'=>'Tahunan',
        'bidang_id'=>1,
        'average'=>'USD 150,000',
        'link_web'=>'https://siwi.org/latest/the-water-man-of-india-wins-2015-stockholm-water-prize-2/',
        'tingkat'=>1
      ]);
      RefPrizes::query()->create([
        'name'=> '1907 Trailblazer Award',
        'frequency'=>'Tahunan',
        'bidang_id'=>1,
        'average'=>'USD 120,000',
        'link_web'=>'https://www.1907.foundation/award',
        'tingkat'=>1
      ]);
      RefPrizes::query()->create([
        'name'=> 'Pritzker Architecture Prize',
        'frequency'=>'Tahunan',
        'bidang_id'=>1,
        'average'=>'USD 100,000',
        'link_web'=>'https://www.pritzkerprize.com/about',
        'tingkat'=>1
      ]);
      RefPrizes::query()->create([
        'name'=> 'Rumelhart Prize',
        'frequency'=>'Tahunan',
        'bidang_id'=>1,
        'average'=>'USD 100,000',
        'link_web'=>'https://cognitivesciencesociety.org/rumelhart-prize/',
        'tingkat'=>1
      ]);
      RefPrizes::query()->create([
        'name'=> 'World 2% Top Scientist',
        'frequency'=>'Tahunan',
        'bidang_id'=>1,
        'tingkat'=>1
      ]);
    }
}
