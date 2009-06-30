<?php
//@see http://au.php.net/manual/en/domdocument.loadxml.php

$xml = <<<EOF
<?xml version="1.0" encoding="UTF-8" ?> 
<Module>
  <ModulePrefs title="hello world example" /> 
  <Content type="html">
     <![CDATA[ 
       Hello, world!
     ]]>
  </Content> 
</Module>
EOF;

$dom = new DomDocument;
$dom->preserveWhiteSpace = FALSE;
$dom->loadXML($xml);

$params = $dom->getElementsByTagName('Content');
foreach($params as $k => $v) {
    echo $v->nodeValue;
}



?>
