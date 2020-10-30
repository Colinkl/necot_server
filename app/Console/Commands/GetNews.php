<?php

namespace App\Console\Commands;

use App\Models\News;
use Illuminate\Console\Command;
use App\Network\News as NewsNetwork;

class GetNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get news and save to database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        while($news = NewsNetwork::get())
        {
            foreach ($news as $item)
            {
                News::create($item);
            }
        }

        return 0;
    }
}
