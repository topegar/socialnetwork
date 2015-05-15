<?php
	$a=1;
	++$a;
	$a*=$a;
	echo "P1: " . --$a;
	echo " / " . $a;

	$a = array();
	$a[0] = 1;
	if($a==null)
	{
		echo '<br>P5: verdadero';
	}
	else
	{
		echo '<br>P5: falso';
	}

	$a=1;
	function Test()
	{
		$a=0;
		
	}
	Test();

	echo "P8: a=$a";
?>