<!DOCTYPE html>
<html>
	<head>
		<?php include "../globalresources/head.php";?>
		<link rel="stylesheet" type="text/css" href="index.css"/>
		<title> Jozwald.io Donate </title>
		<script type="text/javascript">
			var total = 0;
			var maxCash = 1000;
			var interval = 50;
			
			function drawGoals(cash)
			{
				var pc = document.getElementById("goals");
				var canvas = pc.getContext("2d"); 		//jquery feels good man! Update, Google couldn't feel Jquery T_T
				canvas.fillStyle = colors[1];
				canvas.fillRect(pc.width / 4, 0,(pc.width / 4) * 2, pc.height);
				canvas.stroke();
				canvas.fillStyle = colors[0];
				canvas.fillRect(pc.width / 4, 0,(pc.width / 4) * 2, pc.height * (cash / maxCash));
				canvas.stroke();
				var relInt = pc.height * (interval / maxCash);
				for(var l = 0, i = relInt, c = interval; l <= 20; i += relInt, c += interval, l++)
				{
					canvas.beginPath();
					for(var j = pc.width / 4; j < (pc.width / 4) * 3; j++)
					{
						canvas.fillStyle = "rgb(0,0,0)";
						canvas.fillRect(j, i, 1, 1);
					}
					canvas.stroke();
					canvas.fillStyle="rgb(0,0,0)";
					canvas.font = "9px";
					canvas.fillText("$" + c, (pc.width / 2) - 5 , i + 10);
				}
			}
		</script>
	<head>
	<body>
		<?php include "../globalresources/header.php";?>
		<h1> Welcome to the donations page! </h1>
		<hr/>
		<h3> Sorry about that </h3>
		<p> 
			Im well aware that you came here to throw your cash at me, Who woulden't want to do that? <br/>
			However im somewhat lazy and need to learn the PayPal web API before i can make a donate button.<br/>
			Long story short if you want to donate but can't just contact me. (On the contact Page)
		</p>
		<hr/>
		<h3>Donations</h3>
		<p>
			All Donations will go directly to pay for the beterment of the server. aka. <b>I WILL NOT TAKE YOUR MONEY FOR PERSONAL USE!!!</b></br>
			Unlike some pesants, I know how to host a server by myself, meaning that there are no hosting fees.<br/> 
			However there are many other fees that come with hosting a server, such as hardware upgrades and domain renewal. <br/>
			Below you can see some of the fees and goals I have for the server.
		</p>
		<hr/>
		<p>
			The Donation Bar: Good in concept, bad in canvas.<br/>
			(Needs work, it kinda works but the canvas messes up the lines and text due to compression)
		</p>
		<table>
			<tr>
				<td>
					<canvas id="goals">
						Uh-Oh! looks like your using a non HTML5 compatable browser. WHYYYYYYYYYYYYYYYYYYYYY?!
					</canvas>
				</td>
				<td>
					<h2> The Domain Name: $80/yr </h2>
					<p> Priority: Very High </p>
					<p>
						I dont actualy own the Jozwald.io domain as you can probably see its hosted on my local ip (Plz no DDOS)<br/>
						The cheapest I could find it was $80 a year, plz help buy thanks.
					</p>
					<hr/>
					<h2> Server Hardwear: Depends, $1,000+? </h2>
					<p> Priority: High </p>
					<p>
						Oh boy, where do i begin? The current Server is running on a, 2006 Dell Dimention C521 (The only other computer i have).
						Some Specs: 500 MB DDR2 RAM (REALLY BAD), AMD Sempron 64-bit (can barely run windows XP), intigrated graphics (cancer).
						Goals: A ton of intel server stuff that im not gonna list.
					</p>
					<hr/>
					<h2> SSL Certificate: $50/yr </h2>
					<p> Priority: Very Low </p>
					<p>
						An SSL certificate is a way of showing users that their sensitive data is encrypted while traveling over the internet.
						One can observe if a site has an SSL certificate by the Hypertext transfer protocal,
						an http:// conction means non encrypted while an https:// conection means your data cant be taped as it traveres the web.
					</p>
				</td>
			</tr>
		</table>
		<?php include "../globalresources/footer.php";?>
		<script type="text/javascript">
			drawGoals(total);
		</script>	
	</body>
</html>