<?php
/* Head ends here */
class node{
	public x int;
	public y int;
	public poids int;
	
	public function __construct($_x,$_y,$_p){
		$this->x = $_x;
		$this->y = $_y;
		$this->p = $_poids;
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
    
    /*
    $sensR=array();
    $sensR[0]="RDRDD";
    $sensR[1]="RRRDL";
    $sensR[2]="RURDD";
    $sensR[3]="RULLL";
    $sensR[4]="UULUL";
    */
    
    $dirtTab=array();
    
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
            if($b=="d"){ 
                $trouve=1;
                $c=abs($i-$posc)+abs($j-$posr);
                
		$n=new node($i,$j,$c);
		array_push($dirtTab,$n);
		/*switch($j){
			case 0:
				if($i>1){
					if($c<$min){$x=$i;$y=$j;$min=$c;}
				}else{
					if($c<=$min){$x=$i;$y=$j;$min=$c;}
				}                    
				break;
			case 1:                    
				if($i>1){
					if($c<$min){$x=$i;$y=$j;$min=$c;}
				}else{
					if($c<=$min){$x=$i;$y=$j;$min=$c;}
				}  
				break;
			case 2:                    
				if($i>1){
					if($c<$min){$x=$i;$y=$j;$min=$c;}
				}else{
					if($c<=$min){$x=$i;$y=$j;$min=$c;}
				}  
				break;
			case 3:                     
				if($i>2){
					if($c<=$min){$x=$i;$y=$j;$min=$c;}
				}else{
					if($c<$min){$x=$i;$y=$j;$min=$c;}
				}  
				break;
			case 4:                     
				if($i>2){
					if($c<=$min){$x=$i;$y=$j;$min=$c;}
				}else{
					if($c<$min){$x=$i;$y=$j;$min=$c;}
				}   
				break;
		}*/
	
		

            }            
        }
    }
        if($trouve!=1){
           $s=substr($sensR[$posr],$posc,1);
	   switch($s){
		case "R":
			$str="RIGHT";
		break;
		case "D":
			$str="DOWN";
		break;
		case "U":
			$str="UP";
		break;
		case "L":
			$str="LEFT";
		break;	   
	   }
        }else{
	       $dx=$x-$posc;
	       $dy=$y-$posr;     
	       if($dx==0){	
		   if($dy<0){
		       $str="UP\n";}else{$str="DOWN\n";}
	       }else{
		   if($dx<0){
		       $str="LEFT\n";}else{$str="RIGHT\n";}
	       }
	       
	      /* if($posr<2){
			if($dx==0){	
			   if($dy<0){
			       $str="UP\n";}else{$str="DOWN\n";}
		       }else{
			   if($dx<0){
			       $str="LEFT\n";}else{$str="RIGHT\n";}
		       }
	       
	       }else{
			if($dy==0){
				if($dx<0){
			       $str="LEFT\n";}else{$str="RIGHT\n";}

		       }else{
			   if($dy<0){
			       $str="UP\n";}else{$str="DOWN\n";}
			   
		       }
	       }*/	       
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