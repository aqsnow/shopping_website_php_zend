<?php
 namespace ShoppingCart\Model;
 use ShoppingCart\Model\CurelRequest;
 class PaypalDirectPayment{

  public function dopayment($params)
  {
	 $curl_request = new CurlRequest();
	 $results = $curl_request->request("DoDirectPayment",$params);
       if($results)
          return $results;
       else
          return false;
  }
}
?>
