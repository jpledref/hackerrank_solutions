<?php
/* Head ends here */
function displayPathtoPrincess($m,$grid){    
    for($j = 0; $j <= $m-1; $j++){
        $a=$grid[$j];
        $b=strpos($a, "m");
        $c=strpos($a, "p");
        if($b!=false){$x1=$b;$y1=$j;}
        if($c!=false){$x2=$c;$y2=$j;}      
    }
    $dx=$x2-$x1;
    $dy=$y2-$y1;
    $str="";
    if($dx){if($dx<0){$str.=str_repeat("LEFT\n",abs($dx));}else{$str.=str_repeat("RIGHT\n",$dx);}}
    if($dy){if($dy<0){$str.=str_repeat("UP\n",abs($dy));}else{$str.=str_repeat("DOWN\n",$dy);}}    
    echo $str;
}
/* Tail starts here */
$fp = fopen("php://stdin", "r");

fscanf($fp, "%s", $m);

$grid = array();
for ($i=0; $i<$m; $i++) {
    fscanf($fp, "%s", $grid[$i]);
}

displayPathtoPrincess($m,$grid);

?>