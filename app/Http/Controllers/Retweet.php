<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;

class Retweet extends Controller
{
    public function run(Request $request)
    {

        $post_tweets = $this->getConnection()->post("statuses/update", ["status" => $request->tweet]);

        //echo json_encode($post_tweets);

        return redirect('/')->with('status', 'Tweet Posted');
    }

    public function tweets(Request $request)
    {
        $tweets = $this->getConnection()->get("search/tweets", ["q" => urlencode($request->tag)]);

        //echo (json_encode($tweets));

        foreach ($tweets->statuses as $tweet) {
            echo "<p>" . $tweet->text . "</p>";
            echo "<p>" . $tweet->created_at . "</p>";
            echo "<p>" . $tweet->user->name . "</p>";
            echo "<p>" . $tweet->user->screen_name . "</p>";
            echo "<div><img src='" . $tweet->user->profile_image_url . "'  width='150px' height='150px'></div>";
            echo "<hr>";
        }
    }

    private function getConnection()
    {
        return new TwitterOAuth(config("services.twitter.api_key"), config("services.twitter.api_secret"), config("services.twitter.access_token"), config("services.twitter.access_token_secret"));
    }

    public function heart(Request $request)
    {

        $tweets = $this->getConnection()->get("search/tweets", ["q" => urlencode($request->tag)]);

        //$ids = array_column($tweets['statuses'], "id");

        $tweets = $this->getConnection()->post("favorites/create.json?=id" . $tweets->statuses[0]->id);

        //echo json_encode($tweets);

        return redirect('/')->with('status', 'First Tweet matching ' . $request->tag . ' favourated');
    }


    public function retweethashtag(Request $request)
    {

        $tweets = $this->getConnection()->get("search/tweets", ["q" => urlencode($request->tag)]);

        //$ids = array_column($tweets['statuses'], "id");

        $tweets = $this->getConnection()->post("statuses/retweet/" . $tweets->statuses[0]->id);

        //echo json_encode($tweets);

        return redirect('/')->with('status', 'First Tweet Matching ' . $request->tag . ' retweeted');
    }
}