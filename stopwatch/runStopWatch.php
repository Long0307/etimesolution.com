<?PHP
// As of PHP 7.1 you can simply do this:

// $date = new DateTime("00:00:00");
// $date::createFromFormat('U.u', microtime(true));
// $string = $date->format("H:i:s.u");

// $explode = explode(".", $string);

// echo $explode[0]."+".".".substr($explode[1], 0,2);

$milliseconds = 1375010774123;
//                                 V - Use microseconds instead of milliseconds
$d = DateTime::createFromFormat('U.u', number_format($milliseconds/1000, 3, '.', ''));
print $d->format("m-d-Y H:i:s.u");

?>