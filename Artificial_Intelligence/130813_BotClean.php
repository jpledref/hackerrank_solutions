<?php
/* Head ends here */
function next_move(&$posr, &$posc, &$board) {
    //your logic here
    
    if(substr($board[$posr],$posc,1)=="d"){echo "CLEAN";}else{    
    $tab=null;
    $x=null;
    $y=null;
    $min=999999;
    $str="";        
    for($j = 0; $j <= 4; $j++){
        $a=$board[$j];
        for($i = 0; $i <= 4; $i++){
            $b=substr($a,$i,1);
            if($b=="d"){               
                $c=abs($i-$posc)+abs($j-$posr);
                if($c<$min){$x=$i;$y=$j;$min=$c;}
            }            
        }
    }
        $dx=$x-$posc;
        $dy=$y-$posr;     
       if($dx==0){	if($dy<0){$str="UP\n";}else{$str="DOWN\n";}}else{if($dx<0){$str="LEFT\n";}else{$str="RIGHT\n";}}
        echo $str;
    }
}
/* Tail starts here */
$fp = fopen("php://stdin", "r");

$temp = fgets($fp);              //moves made by the second player
$position = split(' ',$temp);

$board = array();

for ($i=0;$i<5;$i++) {
    fscanf($fp, "%s", $board[$i]);
}

next_move($position[0], $position[1], $board);
?>