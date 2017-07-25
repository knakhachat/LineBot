<?php
	function quote_generate()
	{
		$quote = array("ไปนอนไป๊",
		"นอนดึกเหรอ","ไปทำอะไรมา","ติดซีรี่ย์อ่ะดิ","เหมือนกันเลย");

		return($quote[rand(0, count($quote) - 1)]);
	}

	echo quote_generate();
?>
