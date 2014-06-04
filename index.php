<?php

require_once("xml2array.inc.php");

$rss = file_get_contents("http://www.google.com/alerts/feeds/13399991165271360946/10512385881102747147");

$obj = xml2array($rss, $get_attributes=1);

echo "<style type=\"text/css\">"
    .".feed-container { width:100%; height:auto; position:relative; border:none; font-family:Georgia; } "
    .".feed-box { width:40%; position:relative; float:left; border:solid 1px green; margin:10px 10px 10px 10px; height:auto; padding:10px 10px 14px 10px; overflow:hidden; font-size:16px; }"
    .".feed-link { position:absolute; font-weight:bold; font-size:100%; color:#dd4444; width:150%; }"
    .".feed-link:hover { color:#dd8888; }  "
    .".feed-desc { font-weight:normal; position:relative; top:4px; font-size:80%; color:gray; }"
    ."</style>";


echo "<div class=\"feed-container\">";
foreach ($obj["feed"]["entry"] as $v) {


  echo "<div class=\"feed-box\">"
        ."<a class=\"feed-link\" href=\"".$v['link']['attr']['href']."\">".$v['title']['value']."</a>"
        ."<br /><span class=\"feed-desc\">".$v['content']['value']."</span>"
        ."</div>"
        ;
}

echo "</div>";


?>