<!DOCTYPE html>
<html>
	<head>
		<?php include "../globalresources/head.php";?>
		<!--<link rel="stylesheet" type="text/css" href="mandelbrot.css">--> 
		<link rel="stylesheet" type="text/css" href="index.css">
		<script src="index.js"></script>
		<title>Mandelbrot Simulator</title>
	</head>
	<body>
		<?php include "../globalresources/header.php";?>
		<form>
			<fieldset>
				<legend>Settings</legend>
				<p>Iterations:</p>
				<input id="iter" type="number" maxlength="3" value="40"/>
				<p>Zoom:</p>
				<input id="zoom" type="number" maxlength="3" value="0.8"/>
				<p>X-Coord:</p>
				<input id="xCent" type="number" maxlength="3" value="-0.75"/>
				<p>Y-Coord:</p>
				<input id="yCent" type="number" maxlength="3" value="0"/>
				<input type="button" value="Generate" onclick="drawSet()"/>;
			</fieldset>
		</form>
		<div id="dispCont" width="100%" height="100%">
			<canvas id="disp" width="auto" height="auto">
				This Page Is not suported on ur Browser
			</canvas>
		</div>
		<?php include "../globalresources/footer.php";?>
	</body>
</html>