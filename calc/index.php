<!DOCTYPE html>
<html>
	<head>
		<?php include "../globalresources/head.php";?>
		<link rel="stylesheet" type="text/css" href="../globalresources/tabs.css"/>
		<link rel="stylesheet" type="text/css" href="index.css"/>
		<script src="../globalresources/tabs.js"></script>
		<script src="index.js"></script>
		<title>JozGraph</title>
	</head>
	<body>
		<?php include "../globalresources/header.php";?>
		<p> Welcome To JozGraph! This program uses parametric functions to graph parametric, polar, and regular equations</p>
		<p> This program uses Javascript Expressions for mathematical calculations, this sounds scary but it's not just <a href="JSMath.php">click here</a>!</p>
		<div id="tabCtrl"></div>
		<div id="Rectangular" class="tab">
			<div class="inline-block">
				<p>Normal Function To Graph</p>
				<label for="xr">y = f(x) =</label>
				<input id="xr" type="text" value="x" style="width:300px"/><br/>
			</div>
			<button style="display:block" onclick="graphRec()">Graph</button>
			<button style="display:block" onclick="clearGraph()">Clear</button>
		</div>
		<div id="Polar" class="tab">
			<div class="inline-block">
				<p>Polar Function To Graph</p>
				<label for="ri">r = f(t) =</label>
				<input id="ri" type="text" value="Math.cos(9 * t) * 5" style="width:300px"/><br/>
			</div>
			<button style="display:block" onclick="graphPol()">Graph</button>
			<button style="display:block" onclick="clearGraph()">Clear</button>
		</div>
		<div id="Parametric" class="tab">
			<div class="inline-block">
				<p>Parimetric Function To Graph</p>
				<label for="xi">x = f(t) =</label>
				<input id="xi" type="text" value="(Math.cos(t) - Math.pow(Math.cos(80 * t), 3)) * 3" style="width:300px"/><br/>
				<label for="yi">y = f(t) =</label>
				<input id="yi" type="text" value="(Math.sin(t) - Math.pow(Math.sin(80 * t), 3)) * 3" style="width:300px"/><br/>
			</div>
			<button style="display:block" onclick="graphPara()">Graph</button>
			<button style="display:block" onclick="clearGraph()">Clear</button>
		</div>
		<div id="Settings" class="tab">
			<div class="warning">
				<p>Warning: Unbalancing the center of the graph is not supported yet.</p>
			</div>
			<div class="inline-block">
				<p>Window</p>
				<label for="widi">Width=</label>
				<input id="widi" type="number" value="" min="0" max="1000" style="width:50px"/><br/>
				<label for="higi">Hight=</label>
				<input id="higi" type="number" value="" min="0" max="1000" style="width:50px"/><br/>
				<label for="xmini">XMin=</label>
				<input id="xmini" type="number" value="" min="-1000" max="-1" style="width:50px"/><br/>
				<label for="xmaxi">XMax=</label>
				<input id="xmaxi" type="number" value="" max="1000" max="1" style="width:50px"/><br/>
				<label for="xinci">XInc&nbsp;=&nbsp;</label>
				<input id="xinci" type="number" value="" max="100" min="0.01" style="width:50px"/><br/>
				<label for="ymini">YMin=</label>
				<input id="ymini" type="number" value="" min="-1000" max="-1" style="width:50px"/><br/>
				<label for="ymaxi">YMax=</label>
				<input id="ymaxi" type="number" value="" max="1000" max="1" style="width:50px"/><br/>
				<label for="yinci">YInc&nbsp;=&nbsp;</label>
				<input id="yinci" type="number" value="" max="100" min="0.01" style="width:50px"/><br/>
			</div>
			<div class="inline-block">
				<p> 
					T Values:<br/>
					Joz Graph uses parametric funtions to graph not only parametric but also rectangular and polar functions<br/>
					If you want to change the t values these parametric funtions are graphed over do it here
				</p>
				<div class="inline-block">
					<p>Rectangular</p>
					<label for="rtmini">tmin=&nbsp;</label>
					<input id="rtmini" type="number" value="" style="width:50px"/><br/>
					<label for="rtmaxi">tmax=</label>
					<input id="rtmaxi" type="number" value="" style="width:50px"/><br/>
					<label for="rtinci">tinc=&nbsp;&nbsp;</label>
					<input id="rtinci" type="number" value="" style="width:50px"/><br/>
				</div>
				<div class="inline-block">
					<p>Polar</p>
					<label for="potmini">tmin=&nbsp;</label>
					<input id="potmini" type="number" value="" style="width:50px"/><br/>
					<label for="potmaxi">tmax=</label>
					<input id="potmaxi" type="number" value="" style="width:50px"/><br/>
					<label for="potinci">tinc=&nbsp;&nbsp;</label>
					<input id="potinci" type="number" value="" style="width:50px"/><br/>
				</div>
				<div class="inline-block">
					<p>Parametric</p>
					<label for="patmini">tmin=&nbsp;</label>
					<input id="patmini" type="number" value="" style="width:50px"/><br/>
					<label for="patmaxi">tmax=</label>
					<input id="patmaxi" type="number" value="" style="width:50px"/><br/>
					<label for="patinci">tinc=&nbsp;&nbsp;</label>
					<input id="patinci" type="number" value="" style="width:50px"/><br/>
				</div>
			</div>
			<div class="inline-block">
				<p>Display Options</p>
				<label for="inveri">Invert background</label>
				<input id="inveri" type="checkbox"/><br/>
				<label for="polari">Polar background</label>
				<input id="polari" type="checkbox"/><br/>
			</div>
			<button style="display:block" onclick="changeSettings()">Update Settings</button> 
		</div>
		<div id="error" class="warning" style="display:none;">
			<p id="error-text"></p>
		</div>
		<div id="dispCont">
			<canvas id="disp">
				Sorry! your browser does not support HTML5 Canvases and cant use this Application  
			</canvas>
		</div>
		<?php include "../globalresources/footer.php";?>
	</body>
</html>
