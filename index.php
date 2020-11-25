<?php

	##################################
	#	Specially for job.alif.tj    #
	##################################

	$input_file = "input.txt";
	$operation = "+";
	$content = file_get_contents($input_file);
	$int_arr = explode("\n", $content);

	$p = fopen('positives.txt', 'w+');
	$n = fopen('negatives.txt', 'w+');

	for ($i = 0; $i < count($int_arr); $i++) {
		$row = explode(' ', $int_arr[$i]);
		$res = realizeOp($row[0], $operation, $row[1]);

		if ($res > 0) {
			fwrite($p, $res."\n");
		} else {
			fwrite($n, $res."\n");
		}
	}

	fclose($p); fclose($n);

	function realizeOp($a, $op, $b) {
		if ($op == "+") {
			return $a + $b;
		} 
		else if ($op == '-') {
			return $a - $b;
		} 
		else if ($op == '/') {
			return $a / $b;
		} 
		else if ($op == '*') {
			return $a * $b;
		} 

		return false;
	}

?>