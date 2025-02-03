<?php

namespace App\Console\Commands;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Console\Command;

class PublishArticles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'articles:publish-scheduled';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish scheduled articles';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $scheduledArticles = Article::where('draft', 1)
            ->whereNotNull('scheduled_at')
            ->get();
 
        foreach ($scheduledArticles as $article) {
            $originalCreatedAt = $article->scheduled_at; // Store the original creation date

            if (Carbon::parse($article->scheduled_at)->lte(Carbon::now())) {
                $article->update([
                    'published_at' => Carbon::now(),
                    'scheduled_at' => null,
                    'draft' => 0,
                    'created_at' => $originalCreatedAt // Set created_at to the original creation date
                ]);

                $this->info('Article published: ' . $article->judul);
            } else {
                // If the scheduled time is in the future, update only scheduled_at and set draft to 1
                $article->update([
                    'scheduled_at' => null,
                    'draft' => 1,
                    'created_at' => $originalCreatedAt // Set created_at to the original creation date
                ]);

                $this->info('Article scheduled for future: ' . $article->judul);
            }
        }

        $this->info('Scheduled articles published.');
    }
}
