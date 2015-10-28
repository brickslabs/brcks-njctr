<?
require_once 'init.php';

$percentage = 100;

$data = round($percentage / 100 * 60);
echo "Number of seconds : " . $data . "</br>";

$dateSeconds = date('s');
echo "System Seconds : " . $dateSeconds . "</br>";

$arrayItem = array('01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38','39','40','41','42','43','44','45','46','47','48','49','50','51','52','53','54','55','56','57','58','59','00');
$arrayRandKeys = array_rand($arrayItem, $data);

for ($i=0; $i < $data; $i++) {
	$secondsCheck = $arrayItem[$arrayRandKeys[$i]];
	if ($dateSeconds == $secondsCheck)
		echo $secondsCheck . " TRUE </br>";
	else
		echo $secondsCheck . "</br>";
}
		