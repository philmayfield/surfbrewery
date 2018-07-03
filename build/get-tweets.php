<?php
session_start();
require_once("twitteroauth.php"); //Path to twitteroauth library
 
$twitteruser = "SurfBrewery";
$notweets = 4;
$consumerkey = "qWOJmD4kJzA7xGvdf0Wg";
$consumersecret = "wsDmXWrSm8uVThPf7TNQmsJSVOeEjATN3ekFfst7gE";
$accesstoken = "269478439-NL6nWzDdRof0x7Qd4UzqP8wOEJz2gxE5iZJJLWAp";
$accesstokensecret = "sQdHu2wfPZxER12hcxPGUAvQGWWPL8YLtpLFH3WSBLo";
 
function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}
  
$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
 
$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
 
echo json_encode($tweets);
?>