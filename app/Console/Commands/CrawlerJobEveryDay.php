<?php

namespace App\Console\Commands;

use App\Model\CrawlerHistory;
use App\Repositories\SpiderRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CrawlerJobEveryDay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl:day';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Server crawl data from History Crawler table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info("------Start-------");
        $histories = CrawlerHistory::all()->each(function($history){
            
            Log::info('--------'.$history->id.'--------');
            $repo = new SpiderRepository();
            $repo->crawlerByGoutte($history->toArray());
        });
        Log::info("------------End------------");
        // return 0;
    }
}
