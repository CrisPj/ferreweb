<?php
$de = 'USD';
$a = 'MXN';
$url = 'http://finance.yahoo.com/d/quotes.csv?f=l1s1t1&s='.$de.$a.'=X';
$handle = fopen($url,'r');
if ($handle) {
	$r = fgetcsv($handle);
	fclose($handle);
}

echo "1 ".$de.' = '. $r[0].' '.$a.'<br>';
echo "Informacion al dia:".$r[1].' '.$r[2];