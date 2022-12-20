<?php

$a[] = "Adam";
$a[] = "Allen";
$a[] = "Barbie";
$a[] = "Barold";
$a[] = "Cristy";
$a[] = "Dev";
$a[] = "Daniel";
$a[] = "Eddy";
$a[] = "Finch";
$a[] = "Freddy";
$a[] = "Fedrick";
$a[] = "Gautam";
$a[] = "Harmeiny";
$a[] = "Hugue";
$a[] = "Iqbal";
$a[] = "Isandro";
$a[] = "Jasmine";
$a[] = "Jack";
$a[] = "Kapil";
$a[] = "Leo";
$a[] = "Mammothy";
$a[] = "Nargis";
$a[] = "Nancy";
$a[] = "Opu";
$a[] = "Oracle";
$a[] = "Prashant";
$a[] = "Phoenix";
$a[] = "Qureshi";
$a[] = "Ravikumar";
$a[] = "Rosso";
$a[] = "Ricky";
$a[] = "Steave";
$a[] = "Stella";
$a[] = "Trisha";
$a[] = "Trevor";
$a[] = "Uday";
$a[] = "Unknown";
$a[] = "Veerna";
$a[] = "Wolverine";
$a[] = "Xavier";
$a[] = "Yashodha";



$q = $_REQUEST['q'];
$hint = '';

if($q != ''){
	$q = strtolower($q);
	$len = strlen($q);

	foreach ($a as $name){
		if(stristr($q, substr($name, 0, $len))){
			if($hint === ''){
				$hint = $name;
			}else{
				$hint.=", $name"; 
			}
		}
	}
}

echo $hint === "" ? 'nothing' : $hint;