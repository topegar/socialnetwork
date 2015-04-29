<?php
	$a=1;
	++$a;
	$a*=$a;
	echo "P1: " . $a--;

	$a = array();
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
		echo "P8: a=$a";
	}
	Test();
?>