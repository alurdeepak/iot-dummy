<?php

require("./phpMQTT-master/phpMQTT.php");

	
$mqtt = new phpMQTT("10.1.8.15", 1883, "phpMQTT Sub Example"); //Change client name to something unique

if(!$mqtt->connect()){
	exit(1);
}

$topics['alur'] = array("qos"=>0, "function"=>"procmsg");
$mqtt->subscribe($topics,0);

while($mqtt->proc()){
		
}


$mqtt->close();

function procmsg($topic,$msg){
		echo "Msg Recieved: ".date("r")."\nTopic:{$topic}\n$msg\n";
}
	


?>
