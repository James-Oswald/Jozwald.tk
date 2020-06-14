<!DOCTYPE html>
<html>
	<head>
		<title> Test </title>
		<script>
			function init()
			{
				console.log("Init");
				var source = new EventSource("massrelay.php");
				source.onmessage = function(event)
				{
					console.log("massrelay sent: " + event.data);
					var p = document.createElement("p");
					var t = document.createTextNode(event.data);
					p.appendChild(t);
					document.getElementById("rec").appendChild(p);
				};
			}
		
			function test()
			{
				var xhr = new XMLHttpRequest();
				xhr.onreadystatechange = function () 
				{
					if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) 
					{
						console.log("reciver responded: " + xhr.responseText);
					}
				}
				xhr.open("GET", "reciver.php?d=" + document.getElementById("inp").value , true);
				xhr.send();
				console.log("you sent: " + document.getElementById("inp").value);
			}
		</script>
	</head>
	<body>
		<button onclick="init()">Start Test</button> 
		<textarea id="inp"></textarea>
		<button onclick="test()">click me</button>
		<div id="rec"></div>
	</body>
</html>