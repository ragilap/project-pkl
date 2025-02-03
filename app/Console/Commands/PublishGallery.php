<?php

namespace App\Console\Commands;
use App\Models\Galery;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;

class PublishGallery extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'galeries:publish-scheduled';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish scheduled Galeries';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $scheduledGaleries = Galery::where('draft', 1)
        ->whereNotNull('scheduled_at')
        ->get();

        // dd($scheduledGaleries);

        foreach ($scheduledGaleries as $galeries) {
            $originalCreatedAt = $galeries->scheduled_at; // Store the original creation date
            if (Carbon::parse($galeries->scheduled_at)->lte(Carbon::now())) {

                $galeries->update([
                    'published_at' => Carbon::now(),
                    'scheduled_at' => null,
                    'draft' => 0,
                    'created_at' => $originalCreatedAt // Set created_at to the original creation date
                ]);

                // dd($galeries);

                $this->info('galeries published: ' . $galeries->judul);
            } else {
                // If the scheduled time is in the future, update only scheduled_at and set draft to 1
                $galeries->update([
                    'scheduled_at' => null,
                    'draft' => 1,
                    'created_at' => $originalCreatedAt // Set created_at to the original creation date
                ]);

                $this->info('Galery scheduled for future: ' . $galeries->judul);
            }
        }

        $this->info('Scheduled Galeries published.');
    }
}
