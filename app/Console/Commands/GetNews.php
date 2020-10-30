<?php

namespace App\Console\Commands;

use App\Models\News;
use Carbon\Traits\Date;
use Illuminate\Console\Command;
use App\Mutations\DateMutation;
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
        $this->info('News saving');
        $page = 1;
        $saved = 0;

        while($news = NewsNetwork::get($page))
        {
            foreach ($news as $item)
            {
                $this->line('<fg=blue>-----------------------------------</>');
                $this->line('<fg=blue>Save record</>');

                $item['date'] = DateMutation::toUnix($item['date']);
                $this->info('Title - '. $item['title']);
                $this->info('Avatar - '. $item['avatar']);
                $this->info('Link - '. $item['link']);
                $this->info('Date - '. $item['date']);

                News::create($item);

                $saved++;

                $this->line('<fg=blue>-----------------------------------</>');
            }
            
            $page++;
        }

        $this->line("Saved - $saved");

        return 0;
    }
}
