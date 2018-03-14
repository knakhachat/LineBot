<?php

// example: https://github.com/onlinetuts/line-bot-api/blob/master/php/example/chapter-01.php

include ('line-bot-api/php/line-bot.php');

$channelSecret = '4b05c24b604f3ad4d9336963f3b11351';
$access_token  = 'SRVmlBWe3AGaCl6IEx9LuU2h5lK+SYnym9C6TT/qC0QjlZDBntG3MZYNKeCToylKaf/xqUF8JKYdMnSSxRSUrh5YLSdtSc7pZDUHH3G+2vcNIimvwWMWMpQq1oyIz2Jum5KNqeFGRkdxss0aGyWj2QdB04t89/1O/w1cDnyilFU=';

$bot = new BOT_API($channelSecret, $access_token);
	
if (!empty($bot->isEvents)) {
		
	$bot->replyMessageNew($bot->replyToken, json_encode($bot->message));

	if ($bot->isSuccess()) {
		echo 'Succeeded!';
		exit();
	}

	// Failed
	echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody(); 
	exit();

}
