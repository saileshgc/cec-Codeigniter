<?php
/*$req = 'cmd=_notify-validate';
		foreach ($_POST as $key => $value){
			$value = urlencode(stripslashes($value));
			$req .= "&$key=$value";
			
		}
		
		// post back to PayPal system to validate
		$header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
		$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
		$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
		//For Live Mode: ssl://www.paypal.com
		//For Test Mode: ssl://www.sandbox.paypal.com
		//$fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);
		//$fp = fsockopen ('www.sandbox.paypal.com', 80, $errno, $errstr, 30);
		$fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);
		
		// assign posted variables to local variables
		$item_name = $_POST['item_name'];
		$item_number = $_POST['item_number'];
		$payment_status = $_POST['payment_status'];
		$payment_amount = $_POST['mc_gross'];
		$payment_currency = $_POST['mc_currency'];
		$txn_id = $_POST['txn_id'];
		$receiver_email = $_POST['receiver_email'];
		$payer_email = $_POST['payer_email'];
		$local_txn_id = $_POST['custom'];
		$txn_type = $_POST['txn_type'];
		
		if (!$fp){
			// HTTP ERROR
		
			$this->my_library->send_email($to, 'Product Payment Socket Error', 'Product Payment Socket Error');
		}
		else{
			fputs ($fp, $header . $req);
			while (!feof($fp)){
			$res = fgets ($fp, 1024);
			if (strcmp ($res, "VERIFIED") == 0){
				// check the payment_status is Completed
				// check that txn_id has not been previously processed
				// check that receiver_email is your Primary PayPal email
				// check that payment_amount/payment_currency are correct
				// process payment
				if($payment_status == 'Completed'){
						
						$this->my_library->send_email('sona@ebpearls.com', 'hi',$req, $header,'sona@ebpearls.com');
				}
				
			}
			else if (strcmp ($res, "INVALID") == 0){
				// log for manual investigation
				$this->my_library->send_email('sona@ebpearls.com', 'hi','transaction not completed', $header,'roshan@ebpearls.com');
			}
			}
			fclose ($fp);
		}

	}	*/
	$this->my_library->send_email('sona@ebpearls.com', 'hi',$message, '', 'buddha@ebpearls.com');
	?>
	