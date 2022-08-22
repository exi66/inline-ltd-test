<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Post;
use App\Models\Comment;

class DownloadData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:downloaddata';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download test data and insert into db';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
		$postsJson = file_get_contents('https://jsonplaceholder.typicode.com/posts');
		$postsData = json_decode($postsJson);
		
		$commentsJson = file_get_contents('https://jsonplaceholder.typicode.com/comments');
		$commentsData = json_decode($commentsJson);
		
		foreach ($postsData as $elem) {
			$post = Post::create([
				'title' => $elem->title,
				'body' 	=> $elem->body,
			]);
			$post->save();
		}
		
		foreach ($commentsData as $elem) {
			$comment = Comment::create([
				'name' 		=> $elem->name,
				'body' 		=> $elem->body,
				'email' 	=> $elem->email,
				'postId' 	=> Post::find($elem->postId)->id,
			]);
			$comment->save();
		}
		
		echo ('Загружено ' . count($postsData) . ' записей и ' . count($commentsData) . ' комментариев\r\n');
		return 1;
    }
}
