<?php
	$degree=1;
	
	if(isset($_REQUEST['submit'])){
		
		$degree = $_REQUEST['degree'];

		if($degree== 1){
			echo "invalid choice";
		}else{
			echo $degree;
		}

	}else{
		echo ' ';
	}

?>