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
	$myfile = fopen("data.txt", "w");

// Perform the request
	$twitter = new TwitterAPIExchange($settings);
	$stuff = json_decode($twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest());
	

 	  foreach($stuff->statuses as $tweet)
		{
		  $str = "{$tweet->user->screen_name}\n{$tweet->text}\n";
		  echo $str;
		  fwrite($myfile,$str);
		}

		fclose($myfile);

		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => 'http://192.168.1.69:8080/itv/stopITV',
		));
		curl_exec($curl);
		// Set some options - we are passing in a useragent too here
		curl_setopt_array($curl, array(
		    CURLOPT_URL => 'http://192.168.1.69:8080/itv/startURL?url=http://192.168.1.198/',
		));
		// Send the request & save response to $resp
		curl_exec($curl);
		// Close request to clear up some resources
		curl_close($curl);

    ?>