<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Facebook extends Controller
{

    public function profile()
    {
        $fb = $this->getConnection();

        try {
            // Get the \Facebook\GraphNodes\GraphUser object for the current user.
            // If you provided a 'default_access_token', the '{access-token}' is optional.
            $response = $fb->get('/me',  config("services.facebook.app_token"));
        } catch (\Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (\Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        $me = $response->getGraphUser();
        echo 'Logged in as ' . $me->getName();
    }

    private function getConnection()
    {
        return new \Facebook\Facebook([
            'app_id' => config("services.facebook.app_id"),
            'app_secret' => config("services.facebook.app_secret"),
            'default_graph_version' => 'v2.10',
            'default_access_token' => config("services.facebook.app_token"),
        ]);
    }
}