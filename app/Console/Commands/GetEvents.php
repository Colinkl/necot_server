<?php

namespace App\Console\Commands;

use App\Models\Event;
use App\Mutations\DateMutation;
use Illuminate\Console\Command;
use App\Network\Events as EventNetwork;

class GetEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'events:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get events and save to database';

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
        $this->info('Events saving');
        $saved = 0;

        $events = EventNetwork::get();

        foreach($events as $event)
        {
            $this->line('<fg=blue>-----------------------------------</>');
            $this->line('<fg=blue>Save record</>');

            $event['date_start'] = DateMutation::toUnix($event['date_start']);
            $event['date_end'] = DateMutation::toUnix($event['date_end']);

            $this->info('Title - '. $event['title']);

            Event::create($event);

            $saved++;
            $this->line('<fg=blue>-----------------------------------</>');
        }

        $this->line("Saved - $saved");

        return 0;
    }
}
