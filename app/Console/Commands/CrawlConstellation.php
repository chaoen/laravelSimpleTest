<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CrawlConstellationService;

class CrawlConstellation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawler:constellation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crawl information of constellation';

    protected $crawlConstellationService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CrawlConstellationService $crawlConstellationService)
    {
        parent::__construct();
        $this->crawlConstellationService = $crawlConstellationService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->crawlConstellationService->crawl();
    }
}
