<?php
/* Head ends here */
class node{
	public $x;
	public $y;
	public $poids;
	public $nom;
	
	public function __construct($_nom,$_x,$_y,$_p){
		$this->nom = $_nom;
		$this->x = $_x;
		$this->y = $_y;
		$this->poids = $_p;
	}
	
}

function next_move(&$posy, &$posx, &$dimx, &$dimy, &$board) {
    $dirtTab=array();
    
    if(substr($board[$posy],$posx,1)=="d"){echo "CLEAN";}else{
	$x=null;
	$y=null;
	$min=999999;
	$str=""; 
	$cpt=1;
	$n=new node($cpt,$posx,$posy,0);
	array_push($dirtTab,$n);
	
	//$n=new node($cpt,$i,$j,$c);
    
	for($j = 0; $j <= $dimy-1; $j++){
		$a=$board[$j];
		
		for($i = 0; $i <= $dimx-1; $i++){
			$b=substr($a,$i,1);	   
			switch($b){
				case "d":
					$cpt+=1;
					$c=abs($i-$posx)+abs($j-$posy);			
					$n=new node($cpt,$i,$j,$c);
					array_push($dirtTab,$n);					
					//#### MIN ####
					if($c<$min){
						$x=$i;$y=$j;$min=$c;
					}					
					break;	   
			}			
		}
	}  
	
	//#### DELTA ####
	/*$deltaTab=array();
	for($i = 0; $i <= count($dirtTab)-1; $i++){
		$tab=array();
		$nl=$dirtTab[$i];
		$x1=$nl->x;
		$y1=$nl->y;
		for($j = 0; $j<= count($dirtTab)-1; $j++){
			$nc=$dirtTab[$j];
			$x1=$nc>x;
			$y1=$nc->y;
			if($i==$j){array_push($tab,-1);}else{
				$c=abs($x1-$x2)+abs($y1-$y2);
				array_push($tab,$c);
			}			
		}
		array_push($deltaTab,$tab);
	}*/
		
	
    
	//#### DEPLACEMENT ####
	$dx=$x-$posx;
	$dy=$y-$posy;     
	if($dx==0){	
		if($dy<0){$str="UP\n";}else{$str="DOWN\n";}
	}else{
		if($dx<0){$str="LEFT\n";}else{$str="RIGHT\n";}
	}   
	echo $str;
    
    
    }    
    
}
/* Tail starts here */
$fp = fopen("php://stdin", "r");

$temp = fgets($fp);
$position = split(' ',$temp);
$temp = fgets($fp);
$dimension = split(' ',$temp);

$board = array();

for ($i=0;$i<$dimension[0];$i++) {
    fscanf($fp, "%s", $board[$i]);
}

next_move($position[0], $position[1], $dimension[0], $dimension[1], $board);
?>