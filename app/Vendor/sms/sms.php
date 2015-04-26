<?

/*
 *   (c) 2009 Jan Simecky
 *   PHP trida, ktera odesila placene sms pres portal www.smsbrana.cz
 *
 */


/*
	include tridy pro zpracovani xml odpovedi
*/

  require_once('Unserializer.php');

  class CSMSConnect {

    var $api_script="http://api.smsbrana.cz/smsconnect/http.php";	// link na rozhrani API

    var $login=null;  // uzivatelske jmeno SMSconnectu
    var $password=null; // heslo SMSconnectu

    var $auth_type=2;  // typ autorizace, 1 - plain heslo (nedoporuceno), 2 - prenasen pouze kontrolni hash (doporuceno)

    var $queue=array();     //	sms ktere jsou k odeslani


    // generuj sul pro pristup
		function GenerujSul ($delka)
		{
			$sul='';
			$pismena = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789:";
			for ($i=0; $i < $delka; $i++)
			{
				$sul .= $pismena[rand(0,strlen($pismena) -1)];
			}
			return $sul;
		}


		/* vygeneruje post data pro prihlaseni */
    function get_auth_data()
		{
    	if ($this->auth_type==1){
				return "login=".$this->login."&password=".$this->password;
			}else{
				$sul=$this->GenerujSul(10);
				$time=date("Ymd")."T".date("His");
				return "login=".$this->login."&sul=".$sul."&time=".$time."&hash=".md5($this->password.$time.$sul);
			}
	  }

    /* vytvori novou frontu */
    function Create($login, $password, $auth_type)
		{

      $this->queue=array();
      $this->login=$login;
      $this->password=$password;
      $this->auth_type=$auth_type;
    }

    /* Odstraneni prihlasovacich udaju z tridy */
    function Logout()
		{
			$this->login='';
			$this->password='';
			$this->queue=array();
		}

		/* Zpracovani odpovedi */
		function get_answer($data)
		{
			$options = array(
			                XML_UNSERIALIZER_OPTION_ATTRIBUTES_PARSE    => true,
		                  XML_UNSERIALIZER_OPTION_ATTRIBUTES_ARRAYKEY => false,
		                   XML_UNSERIALIZER_OPTION_FORCE_ENUM => array('item')
		                );

			//  be careful to always use the ampersand in front of the new operator
			$unserializer = new XML_Unserializer($options);

			// userialize the document

			$status = $unserializer->unserialize($data,false);

			if (PEAR::isError($status)) {

				return $data;
			} else {
			    $data = $unserializer->getUnserializedData();


					return $data;
			}
		}

    /* Prichozi SMS */
    function Inbox()
		{
  		$get_query  = $this->get_auth_data()."&action=inbox";
	   // echo $get_query;
			ob_start();
		  $ch = curl_init();

		  curl_setopt($ch, CURLOPT_URL,$this->api_script."?$get_query");
		  $res = curl_exec ($ch);
		  curl_close ($ch);
		  $res = ob_get_contents();
		  ob_end_clean();

      return $this->get_answer($res);

   	}

    /* Odeslani 1 SMS */
    function Send_SMS($number,$message,$time='',$sender='',$delivery='')
		{
  		$get_query  = $this->get_auth_data()."&action=send_sms&number=".urlencode($number)."&message=".urlencode($message)."&when=".urlencode($time)."&sender_id=$sender&delivery_report=$delivery";

			ob_start();
		  $ch = curl_init();
		  curl_setopt($ch, CURLOPT_URL,$this->api_script."?$get_query");
		  $res = curl_exec ($ch);
		  curl_close ($ch);
		  $res = ob_get_contents();
		  ob_end_clean();

      return $this->get_answer($res);
   	}


		/* Vlozi sms do fronty */
    function Add_SMS($number,$message,$time='',$sender='',$delivery='')
		{
      $sms['number']=$number;
      $sms['message']=$message;
      $sms['time']=$time;
      $sms['sender']=$sender;
      $sms['delivery']=$delivery;

			$this->queue[]=$sms;
      return true;
    }

		/* vygenerovani XML */
		function build_xml()
		{
			$output="<queue>";
			foreach($this->queue as $sms)
			{
				$output.="<sms>";
				$output.="<number>".htmlspecialchars($sms['number'])."</number>";
				$output.="<message>".htmlspecialchars($sms['message'])."</message>";
				$output.="<when>".htmlspecialchars($sms['time'])."</when>";
				$output.="<sender_id>".htmlspecialchars($sms['sender'])."</sender_id>";
				$output.="<delivery_report>".htmlspecialchars($sms['delivery'])."</delivery_report>";
				$output.="</sms>";
			}
			$output.="</queue>";
			return $output;
		}

    /* Predani fronty k nam do systemu */
    function SendAllSMS()
		{
  		if(count($this->queue)==0)return false;

			$get_query  = $this->get_auth_data()."&action=xml_queue";
		  $xml=$this->build_xml();

			ob_start();
		  $ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,$this->api_script."?$get_query");
 		  curl_setopt($ch, CURLOPT_POST, 1);
 		  curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml");
		  $res = curl_exec ($ch);
		  curl_close ($ch);
		  $res = ob_get_contents();
		  ob_end_clean();
  		return $this->get_answer($res);

    }
  }

?>
