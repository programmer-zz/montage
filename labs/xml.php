<?php
//@see http://au.php.net/manual/en/domdocument.loadxml.php

$xml = <<<EOF
<?xml version="1.0" encoding="UTF-8" ?> 
<Module>
  <ModulePrefs title="hello world example" /> 
  <Content type="html">
     <![CDATA[ 
       i'm xml
     ]]>
  </Content> 
</Module>
EOF;

$html = <<<EOF
<html>
<head>
<title>html title</title>
<meta name="description" content="html's desc" />
<meta name="Author" content="zhang">
</head>
<body>
<div>I'm html</div>
</body>
</html>
EOF;

function bady2cdata($html, $xml) {

    //Get XML params
    $dom = new DomDocument;
    $dom->preserveWhiteSpace = FALSE;
    $dom->loadHtml($html);

    $params = $dom->getElementsByTagName('body');
    foreach($params as $k => $v) {
        $html = $v->nodeValue;
    }

    $params = $dom->getElementsByTagName('title');
    foreach($params as $k => $v) {
        $title = $v->nodeValue;
    }

    $params = $dom->getElementsByTagName('meta');
    foreach($params as $k => $v) {
      if($v->getAttribute('name') == 'description') {
        $description = $v->getAttribute('content');
      }
      if($v->getAttribute('name') == 'Author') {
        $author = $v->getAttribute('content');
      }
    }

    //Write to XML
    $dom = new DomDocument;
    $dom->preserveWhiteSpace = FALSE;
    $dom->loadXML($xml);

    $ModulePrefs = $dom->getElementsByTagName('ModulePrefs');
    foreach($ModulePrefs as $prefs)
    {
        $prefs->setAttribute('title', $title);
        $prefs->setAttribute('description', $description);
        $prefs->setAttribute('author', $author);
    }

    $params = $dom->getElementsByTagName('Content');
    foreach($params as $k => $v) {
        //echo $v->nodeValue;
        $v->nodeValue = $html;
    }

    $s = '<?xml version="1.0" encoding="UTF-8" ?>';
    $s .= $dom->saveHTML();
    return $s;
}

echo bady2cdata($html, $xml);

?>
