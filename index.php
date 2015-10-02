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


// for ($i=0; $i < $data; $i++) { 
	
// 	$availableSeconds = str_pad(mt_rand(0,59), 2, '0', STR_PAD_LEFT);
// 	//$availableSeconds = str_pad($i, 2, '0', STR_PAD_LEFT);
	
// 	if ($dateSeconds == $availableSeconds)
// 		echo $i . ". TRUE " . $availableSeconds . "</br>";
// 	else
// 		echo $i . ". " . $availableSeconds . "</br>";
// }


	// $randValue = mt_rand(1,100);
	// if ($randValue <= $percentage) {
	// 	echo "Random value : " . $randValue . "</br>";
	// 	$data = round($randValue/100 * 60);
	// 	echo "No seconds : " . $data . "</br>";
	// 	for ($i=0; $i < $data; $i++) { 
	// 		echo rand(0,59) . " ";
	// 	}
	// 	echo "</br></br>";
	// }