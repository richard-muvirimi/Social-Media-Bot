<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;
use GrahamCampbell\ResultType\Success;

class Twitter extends Controller
{
    public function tweet(Request $request)
    {

        if ($request->tweet) {

            $tweet = $this->getConnection()->post("statuses/update", ["status" => $request->tweet]);

            $data = [
                "tweet" => $tweet,
                "status" => "Tweet successfully posted",
                "last" => $request->tweet ?? ""
            ];

            return view('twitter.tweet', $data);
        } else {

            $data = [
                "last" => $request->tweet ?? ""
            ];

            return view('twitter.tweet', $data);
        }
    }

    public function random(Request $request)
    {

        if ($request->tweet) {

            $tweet = $this->getConnection()->post("statuses/update", ["status" => $request->tweet[rand(0, 3)]]);

            $data = [
                "tweet" => $tweet,
                "status" => "Tweet successfully posted",
                "last" => $request->tweet ?? array_fill(0, 4, "")
            ];

            return view('twitter.random', $data);
        } else {

            $data = [
                "last" => $request->tweet ?? array_fill(0, 4, "")
            ];

            return view('twitter.random', $data);
        }
    }

    public function search(Request $request)
    {

        if ($request->search) {

            $tweets = $this->getConnection()->get("search/tweets", ["q" => $request->search]);

            $data = [
                "tweets" => $tweets,
                "search" => $request->search
            ];

            return view('twitter.search', $data);
        } else {

            $data = [
                "search" => $request->search
            ];

            return view('twitter.search', $data);
        }
    }

    private function getConnection()
    {
        return new TwitterOAuth(config("services.twitter.api_key"), config("services.twitter.api_secret"), config("services.twitter.access_token"), config("services.twitter.access_token_secret"));
    }

    public function favourite(Request $request)
    {

        if ($request->search) {

            $tweets = $this->getConnection()->get("search/tweets", ["q" => urlencode($request->search)]);

            if (!empty($tweets->statuses)) {
                $tweets = $this->getConnection()->post("favorites/create", ["id" => $tweets->statuses[0]->id]);

                $data = [
                    "tweet" => $tweets,
                    "search" => $request->search
                ];

                return view('twitter.favourite', $data);
            }
        }

        $data = [
            "search" => $request->search
        ];

        return view('twitter.favourite', $data);
    }

    public function comment(Request $request)
    {

        if ($request->search) {

            $tweets = $this->getConnection()->get("search/tweets", ["q" => $request->search]);

            if (!empty($tweets->statuses)) {
                //retweet first
                $tweets = $this->getConnection()->post("statuses/update", ["status" => $request->comment, "in_reply_to_status_id" => $tweets->statuses[0]->id]);

                $data = [
                    "tweets" => $tweets,
                    "search" => $request->search,
                    "comment" => $request->comment
                ];

                return view('twitter.comment', $data);
            }
        }

        $data = [
            "search" => $request->search,
            "comment" => $request->comment
        ];

        return view('twitter.comment', $data);
    }

    public function retweet(Request $request)
    {

        if ($request->search) {

            $tweets = $this->getConnection()->get("search/tweets", ["q" => $request->search]);

            if (!empty($tweets->statuses)) {
                //retweet first
                $tweets = $this->getConnection()->post("statuses/retweet/" . $tweets->statuses[0]->id);

                $data = [
                    "tweet" => $tweets,
                    "search" => $request->search
                ];

                return view('twitter.retweet', $data);
            }
        }
        $data = [
            "search" => $request->search
        ];

        return view('twitter.retweet', $data);
    }

    public function delete(Request $request)
    {

        if ($request->search) {

            $tweets = $this->getConnection()->get("search/tweets", ["q" => $request->search]);

            if (!empty($tweets->statuses)) {
                //delete first
                $tweets = $this->getConnection()->post("statuses/destroy/" . $tweets->statuses[0]->id);

                $data = [
                    "tweets" => $tweets,
                    "search" => $request->search
                ];

                return view('twitter.delete', $data);
            }
        }

        $data = [
            "search" => $request->search
        ];

        return view('twitter.delete', $data);
    }
}
