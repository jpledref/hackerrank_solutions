<?php
$_fp = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */
$a="";
while(!feof($_fp))
{
    $a.="-".strrev(trim(fgets($_fp)))  ;
}
$a=trim(implode("\n",array_reverse(explode("-",$a))));
echo $a;
?>