<?php

namespace App\Services;

use Symfony\Component\DomCrawler\Crawler;
use App\Models\ConstellationFortune;

class CrawlConstellationService
{
    public function crawl()
    {
        $url = "http://astro.click108.com.tw/daily_10.php";
        for ($i=0; $i < 12; $i++) {
            $html = file_get_contents("${url}?iAstro=${i}");
            $crawler = new Crawler($html);

            $name = str_replace('今日運勢－', '', $crawler->filter('div.ROOT > p > a')->last()->html());

            $fortune = $crawler->filter('div.TODAY_CONTENT');
            $overallFortune = substr_count($fortune->filter('p')->eq(0)->filter('span')->html(), "★");
            $overallDescription = $fortune->filter('p')->eq(1)->html();
            $loveFortune = substr_count($fortune->filter('p')->eq(2)->filter('span')->html(), "★");
            $loveDescription = $fortune->filter('p')->eq(3)->html();
            $businessFortune = substr_count($fortune->filter('p')->eq(4)->filter('span')->html(), "★");
            $businessDescription = $fortune->filter('p')->eq(5)->html();
            $wealthFortune = substr_count($fortune->filter('p')->eq(6)->filter('span')->html(), "★");
            $wealthDescription = $fortune->filter('p')->eq(7)->html();

            ConstellationFortune::updateOrCreate(
                ['name' => $name, 'date' => date('Y-m-d')],
                [
                    'overall_fortune' => $overallFortune,
                    'overall_description' => $overallDescription,
                    'love_fortune' => $loveFortune,
                    'love_description' => $loveDescription,
                    'business_fortune' => $businessFortune,
                    'business_description' => $businessDescription,
                    'wealth_fortune' => $wealthFortune,
                    'wealth_description' => $wealthDescription,
                ]
            );
        }
    }
}