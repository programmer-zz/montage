<?php
$client = new SoapClient("https://api.baidu.com/sem/pro/v1/?class=ReportService&wsdl", array('trace' => 1));

//输入参数
$arrInput = array(
	'ReportType' => array( 'reporttype' => 1 ),
	'StartDate' => '2009-02-01',
	'EndDate' => '2009-03-02',
	'StatIds' => array( 1, 2, 3 ),
	'StatRange' => array( 'statrange' => 0 ),
	'StatObj' => array( 'statobj' => 7 ),
);

$arrParams = array('parameters' => array('reportCondition' => $arrInput));

try { 
    $result = $client->__soapCall("getProfessionalReportId", $arrParams);
} catch(SoapFault $fault) {
  // <xmp> tag displays xml output in html
  //echo '请求 : <br/><xmp>',
  echo $client->__getLastRequest();
  //'</xmp><br/><br/> Error Message : <br/>',
  $fault->getMessage(); 
}

?>
