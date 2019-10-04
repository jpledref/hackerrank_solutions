<?php
/* Head ends here */
function nextMove($n,$r,$c,$grid){
	for($j = 0; $j <= $n-1; $j++){
		$a=$grid[$j];
		$b=strpos($a, "p");
		if($b!=false){$x2=$b;$y2=$j;}      
	}
	
	$dx=$x2-$c;
	$dy=$y2-$r;
	$str="";
	
	if($dx==0){	if($dy<0){$str="UP\n";}else{$str="DOWN\n";}}else{if($dx<0){$str="LEFT\n";}else{$str="RIGHT\n";}}
	echo $str;
}
/* Tail starts here */
$fp = fopen("php://stdin", "r");

fscanf($fp, "%d", $n);
$pos = fgets($fp);
$pos = split(' ', $pos);
$grid = array();
for ($i=0; $i<$n; $i++) {
    fscanf($fp, "%s", $grid[$i]);
}

nextMove($n,$pos[0],$pos[1],$grid);

?>
