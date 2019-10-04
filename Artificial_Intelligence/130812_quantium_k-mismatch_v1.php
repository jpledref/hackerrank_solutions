<?php
$_fp = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */

/*INPUTS*/
$input=array();
while(!feof($_fp))
{
    $a=trim(fgets($_fp));
    if(isset($a))array_push($input,$a) ;
}
$k=$input[0];
$s=$input[1];

/*FUNCTIONS*/
function mismatch($x,$y){
    $z=-1;    
    if(strlen($x)==strlen($y)){
        $x=str_split($x,1);
        $y=str_split($y,1);
        $z=count(array_diff_assoc($x,$y));
    }    
    return $z;
}

/*SUBSTRINGS*/
$tab=array();
for($i=0;$i<strlen($s);$i++){
    for($j=1;$j<strlen($s)-$i+1;$j++){         
        $b=substr($s,$i,$j);
        array_push($tab,$b);
    }
}

/*CALC*/
$res=0;
$cpt=0;
for($i=0;$i<count($tab);$i++){
    $line=array();
    for($j=0;$j<count($tab);$j++){
        if($i!=$j&&$j>$cpt&&strlen($tab[$i])==strlen($tab[$j])){
            $tp=mismatch($tab[$i],$tab[$j]);
            if($tp>=0&&$tp<=$k){
                $res++;
            }
        }
    }
    $cpt++;
}

echo $res;
?>
