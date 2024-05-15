<?php

/**
 * Created by PhpStorm.
 * User: KT
 * Date: 12/6/2015
 * Time: 9:44 AM
 */
define('FACEBOOK_SDK_V4_SRC_DIR', __DIR__ . '/facebook/');

class Facebook_api
{
    private static $fb;
    function __construct(){
        require_once 'facebook/autoload.php';
        //session_start();
        self::$fb = new \Facebook\Facebook([
            'app_id' => '269603763560889',
            'app_secret' => '21eda062b61f9465d509c83da74868ce',
            'default_graph_version' => 'v2.10',
        ]);
        //session_start();

    }
    public static function facebook_login(){
        $helper = self::$fb->getRedirectLoginHelper();
        $permissions = ['email', 'user_likes']; // optional
        $loginUrl = $helper->getLoginUrl(base_url().'users/action/login_callback', $permissions);

        return '<a class="media_social fb btn  btn-info" style="display:inline-block;margin-top:10px;" href="' . $loginUrl . '">Log in with Facebook!</a>';
    }

    public static function login_callback(){
        $helper = self::$fb->getRedirectLoginHelper();
        try {
            $accessToken = $helper->getAccessToken();
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        if (isset($accessToken)) {
            // Logged in!
            $_SESSION['facebook_access_token'] = (string) $accessToken;
// OAuth 2.0 client handler
            $oAuth2Client = self::$fb->getOAuth2Client();

// Exchanges a short-lived access token for a long-lived one
            $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
            // Now you can redirect to another page and use the
            // access token from $_SESSION['facebook_access_token']
            self::$fb->setDefaultAccessToken($accessToken);

            try {
                $response = self::$fb->get('/me?fields=id,name,email,first_name,last_name');
                $userNode = $response->getGraphUser();
            } catch(Facebook\Exceptions\FacebookResponseException $e) {
                // When Graph returns an error
                echo 'Graph returned an error: ' . $e->getMessage();
                exit;
            } catch(Facebook\Exceptions\FacebookSDKException $e) {
                // When validation fails or other local issues
                echo 'Facebook SDK returned an error: ' . $e->getMessage();
                exit;
            }

            $arr = array(
                'full_name'=>$userNode->getProperty('name'),
                'email'=>$userNode->getProperty('email'),
                'facebook_id'=>$userNode->getProperty('id')
            );
            //print_r($arr);
            return $arr;
        }
    }

}
