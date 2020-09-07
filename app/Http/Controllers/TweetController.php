<?php

namespace App\Http\Controllers;

use App\Tweet;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Thujohn\Twitter\Facades\Twitter;
// use thujohn\twitter\src\Thujohn\Twitter\Facades as Twitter;
use Abraham\TwitterOAuth\TwitterOAuth;

class TweetController extends Controller
{
    use ApiResponser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function index()
    {
    /**
     * Return the list of tweets
     * @return Illuminate\Http\Response
     */
        $tweets = Tweet::all();
        // seccessResponse from ApiResponser
        return $this->successResponse($tweets);
    }

    public function store(Request $request)
    {
        // Nothin to store
    }

    /**
     * Obtains and show one tweet
     * @return Illuminate\Http\Response
     */
    public function show($tweet)
    {
        $tweet = Tweet::findOrFail($tweet);
        // seccessResponse from ApiResponser
        return $this->successResponse($tweet);

    }


    public function update(Request $request, $tweet)
    {
        // nothing to update
    }

    public function destroy($tweet)
    {
        // nothin to delete
    }

    public function alltweets(){
        // !USES TWITTER API

        $connection = new TwitterOAuth(env('TWITTER_CONSUMER_KEY'), env('TWITTER_CONSUMER_SECRET'), env('TWITTER_ACCESS_TOKEN'), env('TWITTER_ACCESS_TOKEN_SECRET'));
        $content = $connection->get("account/verify_credentials");
        $statuses = $connection->get("statuses/home_timeline", ["count" => 10, "exclude_replies" => true]);
        // $statuses[0]->text;
        return $this->successResponse($statuses);

    }

}
