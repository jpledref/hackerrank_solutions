<?php
/* Head ends here */
class node{
	public $x;
	public $y;
	public $poids;
	
	public function __construct($_x,$_y,$_p){
		$this->x = $_x;
		$this->y = $_y;
		$this->poids = $_p;
	}
	
}

function next_move(&$posr, &$posc, &$board) {
    //your logic here
	//trigger_error("xxxxx");
    
	$tempo=array();
	$tempo=readInfo();
	if(!$tempo){$tempo=$board;}	
	$board=updateInfo($board,$tempo);	
	writeInfo($board);
    
	$fogTab=array();
	$dirtTab=array();
	$minTab=array();
    
	if(substr($board[$posr],$posc,1)=="d"){echo "CLEAN";}else{    
	    //$tab=null;
	    $x=null;
	    $y=null;
	    $min=999999;
	    $str=""; 
	    $trouve=0;
		for($j = 0; $j <= 4; $j++){
			$a=$board[$j];
			
			for($i = 0; $i <= 4; $i++){
				$b=substr($a,$i,1);
		   
				switch($b){
				case "d":
					$trouve=1;
					$c=abs($i-$posc)+abs($j-$posr);			
					$n=new node($i,$j,$c);
					array_push($dirtTab,$n);
					break;
				case "o":
					$c=abs($i-$posc)+abs($j-$posr);			
					$n=new node($i,$j,$c);
					array_push($fogTab,$n);
					break;	   
				}			
			}
		}
	       
		//#### RECHERCHE DIR ####
		$tab=array();
		if($trouve!=1){
			$tab=$fogTab;
		}else{
			$tab=$dirtTab;			
		}      
		
		for($i = 0; $i <count($tab); $i++){
			$tempo=$tab[$i]->poids;
			//trigger_error($tempo);
			if($tempo<$min){
				$x=$tab[$i]->x;
				$y=$tab[$i]->y;
				$min=$tempo;
			}
		}
		
		/*
		if($trouve==1){
			for($i = 0; $i <count($tab); $i++){
				$tempo=$tab[$i]->poids;
				if($tempo==$min){array_push($minTab,$tab[$i]);}
			}
			if(count($minTab)==2){
				$r=rand (0, count($minTab)-1);
				$x=$tab[$r]->x;
				$y=$tab[$r]->y;
			}
		}
		*/
		
		//#### DEPLACEMENT ####
		$dx=$x-$posc;
		$dy=$y-$posr;     
		if($dx==0){	
			if($dy<0){$str="UP\n";}else{$str="DOWN\n";}
		}else{
			if($dx<0){$str="LEFT\n";}else{$str="RIGHT\n";}
		}   
		echo $str;
		
	}
}

function writeInfo($tab){
	$filename = "myfile.txt";	
	$filewrite = fopen( $filename, 'w') or die('Cannot open file:'.$filename);	    
	for($k = 0; $k <= 4; $k++){
		fwrite( $filewrite, $tab[$k]."\n");
	}
	 fclose( $filewrite );	 
}

function readInfo(){
	$z=array();
	$filename = "myfile.txt";	
	if(file_exists($filename)) {
		$filewrite = fopen( $filename, 'r');	 
		for($k = 0; $k <= 4; $k++){
			array_push($z,fread( $filewrite,6));
			//trigger_error($z[$k]."\n");
		}
		 fclose( $filewrite );
	 }
	 return $z;
}

function updateInfo(&$new,$old){	
	$z=array();
	for($k = 0; $k <= 4; $k++){
		for($l = 0; $l <= 4; $l++){	
			if(substr($new[$k],$l,1)=="o"){
				$new[$k]=substr_replace($new[$k],substr($old[$k],$l,1),$l,1);
			}
		}
		array_push($z,$new[$k]);
		//trigger_error($z[$k]."\n");
	}
	return $z;
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