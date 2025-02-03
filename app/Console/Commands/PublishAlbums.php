<?php

namespace App\Console\Commands;

use App\Models\Album;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class PublishAlbums extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'albums:publish-scheduled';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish scheduled Albums';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $scheduledAlbums = Album::where('draft', 1)
            ->whereNotNull('scheduled_at')
            ->get();

            
        foreach ($scheduledAlbums as $albums) {
            $originalCreatedAt = $albums->scheduled_at; // Store the original creation date

            if (Carbon::parse($albums->scheduled_at)->lte(Carbon::now())) {
                $albums->update([
                    'published_at' => Carbon::now(),
                    'scheduled_at' => null,
                    'draft' => 0,
                    'created_at' => $originalCreatedAt // Set created_at to the original creation date
                ]);

                $this->info('Albums published: ' . $albums->nama_album);
            } else {
                // If the scheduled time is in the future, update only scheduled_at and set draft to 1
                $albums->update([
                    'scheduled_at' => null,
                    'draft' => 1,
                    'created_at' => $originalCreatedAt // Set created_at to the original creation date
                ]);

                $this->info('Article scheduled for future: ' . $albums->nama_album);
            }
        }

        $this->info('Scheduled articles published.');
    }
}
