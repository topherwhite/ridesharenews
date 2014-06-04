<?php

require_once("xml2array.inc.php");

$rss = file_get_contents("http://www.google.com/alerts/feeds/13399991165271360946/10512385881102747147");

$obj = xml2array($rss, $get_attributes=1);

echo "<style type=\"text/css\">"
    .".feed-container { width:100%; height:auto; position:relative; border:none; font-family:Georgia; } "
    .".feed-box { cursor:pointer; width:40%; position:relative; float:left; background-color:#eeeeee; border:none; margin:10px 10px 10px 10px; height:auto; padding:10px 10px 14px 10px; overflow:hidden; font-size:16px; -moz-border-radius:5px; -webkit-border-radius:5px; border-radius:5px;  }"
    .".feed-box:hover { background-color:#dddddd; }"
    .".feed-box:hover .feed-link { color:#ee0000; }  "
    .".feed-link { position:absolute; font-weight:bold; font-size:100%; color:#dd4444; width:250%; }"
    .".feed-desc { font-weight:normal; position:relative; top:4px; font-size:80%; color:gray; }"
    ."</style>";


echo "<div class=\"feed-container\">";
foreach ($obj["feed"]["entry"] as $v) {


  echo  "<a href=\"".$v['link']['attr']['href']."\" target=\"_blank\">"
        ."<div class=\"feed-box\">"
        ."<span class=\"feed-link\">".$v['title']['value']."</span>"
        ."<br /><span class=\"feed-desc\">".$v['content']['value']."</span>"
        ."</div>"
        ."</a>"
        ;
}

echo "</div>";


?>