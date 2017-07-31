<?php
$access_token = 'eLygcjtgV5BdGQz9TH0NQIhlAmpw2PADLDaGZBqB/dmijA15WLFoDtCTPphR5K2miCNXHDUuf/l2KhaMxpFpADYl9xucIaOe8HMdY+z9ZW8622MTp8x1zBRxr1hInGh/QBgDdiDvYFjlmqmj6ktG2gdB04t89/1O/w1cDnyilFU=';

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
			}else if(stristr($text,"อั๋น")==TRUE){
				$quote = array("ทำงานอยู่มั้ง","สงสัยหลับ","ไปไหนไม่รู้","ตาอั๋นๆ มีคนเรียก","หมู่นี้ไม่ค่อยเจอ");
				$textreply=quote_generate($quote);
			}else if(stristr($text,"ง่วง")==TRUE){
				//Random Message
				$quote = array("ไปนอนไป๊","นอนดึกเหรอ","ไปทำอะไรมา","ติดซีรี่ย์อ่ะดิ","เหมือนกันเลย","กินกาแฟมะ","มากป่ะ");
				$textreply=quote_generate($quote);
			}else if(stristr($text,"ตี้")==TRUE){
				//Random Message
				$quote = array("ตี้ไหน","ใช่นัตป่ะ","แขกตี้ป่ะ","กรุณาเรียกชื่อให้ครบ เดี๋ยวแปลผิด");
				$textreply=quote_generate($quote);
			}else if(stristr($text,"หวย")==TRUE){
				//Random Message
				$quote = array("ใครถูกพาไปเลี้ยงด้วย","มีเลขเด็ดบอกกันบ้างนะ","ขอให้โชคดี","ฝากเจ๊โอ๊ตเล่น","เมื่อคืนฝันอะไรหว่า");
				$textreply=quote_generate($quote);
			}else if(stristr($text,"อยู่ยาก")==TRUE){
				//Random Message
				$quote = array("ทำใจให้สบายนะ","สัตว์โลกย่อมเป็นไปตามกรรม","ยากยังไงก็ต้องอยู่","ไปไหนดีอ่ะ","พักร้อนดีกว่า");
				$textreply=quote_generate($quote);
			}else if(stristr($text,"เจ๊")==TRUE){
				//Random Message
				$quote = array("เจ๊ไหนเอ่ย","เจ๊โอ๊ต เจ๊หน่อย","หันซ้ายหันขวา มีแต่ป้าล้วนๆ","เจ๊โอ๊ตถูกหวยหรา","...");
				$textreply=quote_generate($quote);
			}else if(stristr($text,"ไปกิน")==TRUE){
				//Random Message
				$quote = array("ไปกินด้วยดิ","ใครเลี้ยงนู๋ไปด้วย");
				$textreply=quote_generate($quote);
			}else if(stristr($text,"จัดเลย")==TRUE){
				//Random Message
				$quote = array("จัดไรกัน","ยาวไปๆ","กี่ดอก","หึหึ","ไปด้วย");
				$textreply=quote_generate($quote);
			}else if(stristr($text,"โอ๊ต")==TRUE){
				//Random Message
				$quote = array("ป้าข้างบ้าน","คุณพี่คนสวย","หุหุ","งวดนี้มีเลขเด็ด");
				$textreply=quote_generate($quote);
			}else if(stristr($text,"555")==TRUE){
				//Random Message
				$quote = array("666","ขำไรนักหนา","หุหุหุ","เลขท้าย 3 ตัว 555","ฮ่าฮ่าฮ่า");
				$textreply=quote_generate($quote);
			}else if((stristr($text,"ปาร์ตี้")==TRUE)||(stristr($text,"ปาตี้")==TRUE)||(stristr($text,"party")==TRUE)){
				//Random Message
				$quote = array("บ้านใครๆ","ไปไหนไปด้วย","เนื่องในโอกาส");
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
