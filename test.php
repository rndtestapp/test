<?php
function deleteFirstLine($fileName){
// check the file exists 
  if(!is_writable($fileName)) {
    print "The file $fileName is not writable";
    exit;
    }
  else {
    $arr = file($fileName);
    }

  //remove the line
  unset($arr[0]);

  // open the file for reading
  if (!$fp = fopen($fileName, 'w+')) {
        print "Cannot open file ($fileName)";
        exit;
     }
  
  if($fp) {
        // write the array to the file
        foreach($arr as $line) { fwrite($fp,$line); }
        fclose($fp);
     }
}
?>

<html>
<body>

<?php

//date date('D, d M Y H:i:s T').'</br>';

$file = "titles2.txt";
$line = 1;
$asdf = fopen($file, 'r');

$wer = 2;
$xmlFile = "rss"."$wer".".xml";
echo $xmlFile;

$xmlDoc = new DOMDocument();
$xmlDoc->load($xmlFile);

$x = $xmlDoc->getElementsByTagName("title");
$y = $xmlDoc->getElementsByTagName("pubDate");
for ($i=1;$i<51;$i++) {
echo $x->item($i)->nodeValue.'<br>';
$line = fgets($asdf);
$x->item($i)->nodeValue="$line";
deleteFirstLine($file);
}
for ($j=49;$j>0;$j--) {
echo $y->item($y)->nodeValue.'<br>';
$line = fgets($asdf);
$y->item($j)->nodeValue=date('D, d M Y H:i:s T');
}
$xmlDoc->save($xmlFile);
/*
echo $x->item(24)->nodeValue.'<br>';
$x->item(2)->nodeValue="2asdf";
echo $x->item(25)->nodeValue.'<br>';
$x->item(3)->nodeValue="3asdf";
echo $x->item(0)->nodeValue.'<br>';
echo $x->item(1)->nodeValue.'<br>';
echo $x->item(2)->nodeValue.'<br>';
$y = $xmlDoc->getElementsByTagName("pubDate");
echo $y->item(0)->nodeValue.'<br>';
$y->item(0)->nodeValue=date('D, d M Y H:i:s T');
echo $y->item(0)->nodeValue.'<br>';
$xmlDoc->save("rss2.xml");
*/
  
?>


</body>
</html>