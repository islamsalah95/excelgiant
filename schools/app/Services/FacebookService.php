<?php

namespace App\Services;

use Facebook\Facebook;

class FacebookService
{
    protected $fb;
    public function __construct()
    {
        $this->fb = new Facebook([
            'app_id' => '2020970931715486', // Hardcoded temporarily
            'app_secret' => env('FACEBOOK_APP_SECRET'),
            'default_graph_version' => 'v22.0',
        ]);
    }

    public function getPosts()
    {
        try {
            $accessToken = env('FACEBOOK_ACCESS_TOKEN'); 
            $pageId = env('FACEBOOK_PAGE_ID');

            $response = $this->fb->get(
                "/$pageId/posts?fields=message,created_time,full_picture,permalink_url",
                $accessToken
            );

            return $response->getDecodedBody();
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
