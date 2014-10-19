   <?php
    require_once('TwitterAPIExchange.php');

    /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
    $settings = array(
    'oauth_access_token' => "1347947786-iKdICAUHt38tAW5HmfGVdiWAHx98qhPHBA71KMF",
    'oauth_access_token_secret' => "82u7Hy0uanTbkwOX6g6WHhasnmDel9sVsuuCCxVALH9HR",
    'consumer_key' => "t4dNaQXF2mtcUqV7hI9po7h3o",
    'consumer_secret' => "vrKVcpjIXWgCVOMBZslh9PEyUeCe9xMlv6R9qIyhHJWXrQzS6N"
    );
    
    $url = 'https://api.twitter.com/1.1/search/tweets.json';
	$requestMethod = 'GET';
	$getfield = '?q=#hacktx&result_type=recent&count=4';

// Perform the request
	$twitter = new TwitterAPIExchange($settings);
	$stuff = json_decode($twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest());
	

 	  foreach($stuff->statuses as $tweet)
		{
		  echo "{$tweet->user->screen_name} {$tweet->text} <br>";
		}
		// 	foreach($string as $items)
		// {
		// // echo "Time and Date of Tweet: ".$items['created_at']."<br />";
		// // echo "Tweet: ". $items['statuses']['text']."<br />";
		// // echo "Tweeted by: ". $items['user']['name']."<br />";
		// // echo "Screen name: ". $items['user']['screen_name']."<br />";
		// 	echo "i";
		// }
    ?>