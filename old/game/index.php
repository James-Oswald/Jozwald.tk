<!DOCTYPE html>
<html>
	<head>
		<title> Jozwald.io </title>
		<script type="text/javascript">
			//Display Engine
			var scene, reneder, camera;
			var players = [];
			
			function 
			
			function initDisplay()
			{
				
			}
			
		</script>
		<script type="text/javascript">
			//player functions
			
			
			
		</script>
		<script type="text/javascript">
			//Transeiver Functions
			
			function postStartData(playername)
			{
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() 
				{
					if (xhttp.readyState == 4 && xhttp.status == 200) 
					{
						init(JSON.parse(xhttp.responseText));
					}
			    };
				xhttp.open("GET", "getworld.php?p=" + data, true);
				xhttp.send();
			}
			
			function reciveEvent(data) 
			{
				/*var type = data.charAt(0); 
				data = data.substr(2, data.length - 1);
				var player = data.substr(0, data.indexOf("|")); 
				switch (type)
				{
					case "N":
						newPlayer(player);
						break;
					case "D":
						delPlayer(player);
						break;
					case "M":
						movePlayer(player);
						break;
				}*/
			}
			
			function send(data)
			{
				var xhttp = new XMLHttpRequest();
				xhttp.open("POST", "reciver.php", true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("data = " + data);
			}
		
		</script>
		<script type="text/javascript">
			
			function initGame(playername)
			{
				postStartData(playername);
				var source = new EventSource("massrelay.php");
				source.onmessage = function(event){reciveEvent(event.data);};
			}
			
		</script>
	</head>
	<body>
		<button onclick="initGame("")"
		<p>ayy</p>
	</body>
</html>
