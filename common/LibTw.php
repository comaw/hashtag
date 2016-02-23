<?php

namespace common;

use common\TwitterAPIExchange;
use Yii;
use yii\helpers\Json;

class LibTw {

    public static $settings = array(
                                'oauth_access_token' => "4493574640-nan8pJMeq6iZooELu4RLp8T43aH6G4eTylFZAhV",
                                'oauth_access_token_secret' => "qoPLVuJh4HfmwrGdLah2x1q0SSSfu82JzWO23HuOkmXHx",
                                'consumer_key' => "9YVNzpAjUX4ODNbvCZ2PDDsPk",
                                'consumer_secret' => "bhZh1NTkSC6yDJvxIh1llgTVpKXoovLGKhU9pKPxwPE1PAwsOH"
                            );

    const URL = 'https://api.twitter.com/1.1/search/tweets.json';
    const LIMITS = 500;

    public static $fields = array('name', 'screan_name', 'location', 'url', 'followers', 'friends', 'time_zone');

    public static function sendSearch($keywords, $recent = 'mixed', $limit = 0){
        $limit = $limit ? $limit : self::LIMITS;
        $requestMethod = 'GET';
        $getfield = '?q='.urlencode($keywords).'&count='.$limit.'&result_type='.$recent.'&lang='.Yii::$app->language;
        $twitter = new TwitterAPIExchange(self::$settings);
        $date = $twitter->setGetfield($getfield)
            ->buildOauth(self::URL, $requestMethod)
            ->performRequest();
        $date = Json::decode($date);
        return $date;
    }
}