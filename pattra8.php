<?php
$access_token = 'vRbM4LIZwUZ9I6GkdRjcem+5WTDvTfdPfgeh/6X2PA/KHXLXsbScRvSQYUsCiUi8AR7hYyr6krCFCAGSxDyIpUvAxZGGfFI3FT3lhHBSmlho6ubKRIRQeK4y5ppBQKRkUFVKXUjBuC5VGaK+3h0zlQdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			/*$messages = [
				'type' => 'text',
				'text' => $text
			];*/
			
			if($text=="สวัสดี"){
				$textreply="สวัสดีจ้า";
			}else if($text=="ชื่ออะไร"){
				$textreply="น้องบอท";
			}else if((stristr($text,"พ่นยุง")==TRUE) || (stristr($text,"ฉีดยุง")==TRUE)){
				$quote = array("เบอร์ติดต่อ ฝ่ายสิ่งแวดล้อม เขตลาดพร้าว (พ่นยุง) โทร 025397773 คุณสมชาย 0994579460");
				$textreply=quote_generate($quote);
			}else if(stristr($text,"ง่วง")==TRUE){
				//Random Message
				$quote = array("ไปนอนไป๊","นอนดึกเหรอ","ไปทำอะไรมา","ติดซีรี่ย์อ่ะดิ","เหมือนกันเลย","กินกาแฟมะ","มากป่ะ");
				$textreply=quote_generate($quote);
			}else if(stristr($text,"หวย")==TRUE){
				//Random Message
				$quote = array("ใครถูกพาไปเลี้ยงด้วย","มีเลขเด็ดบอกกันบ้างนะ","ขอให้โชคดี","ฝากเจ๊โอ๊ตเล่น","เมื่อคืนฝันอะไรหว่า");
				$textreply=quote_generate($quote);
			}else if(stristr($text,"อยู่ยาก")==TRUE){
				//Random Message
				$quote = array("ทำใจให้สบายนะ","สัตว์โลกย่อมเป็นไปตามกรรม","ยากยังไงก็ต้องอยู่","ไปไหนดีอ่ะ","พักร้อนดีกว่า");
				$textreply=quote_generate($quote);
			}else if(stristr($text,"ไปกิน")==TRUE){
				//Random Message
				$quote = array("ไปกินด้วยดิ","ใครเลี้ยงนู๋ไปด้วย");
				$textreply=quote_generate($quote);
			}else if(stristr($text,"จัดเลย")==TRUE){
				//Random Message
				$quote = array("จัดไรกัน","ยาวไปๆ","กี่ดอก","หึหึ","ไปด้วย");
				$textreply=quote_generate($quote);
			}else if(stristr($text,"ไหนกันดี")==TRUE){
				//Random Message
				$quote = array("ได้หมดถ้าสดชื่น","ไปทะเลกันดีก่า ไปเล่นลมโต้คลื่น","ไปไหนไปด้วย ขอช่วย 2 บาท","จัดไป");
				$textreply=quote_generate($quote);
			}else if(stristr($text,"เงินเดือน")==TRUE){
				//Random Message
				$quote = array("เงินเดือนคืออะไร?","ผ่านมาแล้วก็ผ่านไป","หมดตั้งกะวันที่ 1 แล้ว","เงินเดือนนั้นหายาก ต้องลำบากตรากตรำไป");
				$textreply=quote_generate($quote);
			}else if((stristr($text,"HBD")==TRUE) || (stristr($text,"Happy birth day")==TRUE) || (stristr($text,"วันเกิด")==TRUE)){
				//Random Message
				$quote = array("กินเค๊กกัน","มีความสุขมากๆน๊า","ขออำนาจคุณพระศรีรัตนไตรจงดลบันดาลให้มีความสุขตลอดไปจ้า","Happy Birth Day","วันเกิดใครอ่ะ");
				$textreply=quote_generate($quote);
			}
			
			
				$messages = [
				'type' => 'text',
				'text' => $textreply ];
			
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}

function quote_generate($quote){				

	return($quote[rand(0, count($quote) - 1)]);
}
echo "OK";
