<?php

namespace App\Jobs;

use App\Models\Movie;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class TestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $movie;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->movie = [
            'title' => $request->title,
            'imdb_id' => $request->imdb_id,
            'country' => $request->country,
            'year' => (int) $request->year,
        ];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // $user->notify(new UserNotification($user));
        return Http::post('http://moviesapi.ir/api/v1/movies', $this->movie);
    }
}
