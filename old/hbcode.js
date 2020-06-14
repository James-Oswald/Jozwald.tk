
var colorList = new Array(
new Array("#ff33cc", "#ff00ff", "#ff99ff", "#ff66cc"), //pinks and purples
new Array("#00ffcc", "#00ffff", "#66ffff", "#66ffcc"), //light blues and greens
new Array("#ff6600", "#ff0000", "#ff9933", "#ff8566"), //reds and oranges
new Array("#66ff33", "#ffff00", "#ccff66", "#99ff33")); //yellows and greens

colors = colorList[Math.floor(Math.random() * colorList.length)];
 
function hexToR(h) {return parseInt((cutHex(h)).substring(0,2),16);}
function hexToG(h) {return parseInt((cutHex(h)).substring(2,4),16);}
function hexToB(h) {return parseInt((cutHex(h)).substring(4,6),16);}
function cutHex(h) {return (h.charAt(0)=="#") ? h.substring(1,7):h;}
 
function colorAll()
{
	$("body").css("background", "linear-gradient(270deg, " + colors[0] + ", " + colors[1] + ", " + colors[2] + ", " + colors[3] + ")");
	$("body").css("background-size", "800% 800%");
	$("body").css("-webkit-animation", "AnimationName 10s ease infinite");
	$("hr").css("border-color", "linear-gradient(270deg, " + colors[0] + ", " + colors[1] + ", " + colors[2] + ", " + colors[3] + ")");
	$("hr::before").css("border-color", "linear-gradient(270deg, " + colors[0] + ", " + colors[1] + ", " + colors[2] + ", " + colors[3] + ")");
	$(".header-button").each(function()
	{
		random_color = colors[Math.floor(Math.random() * colors.length)];
		$(this).css("color", random_color);
	});
	$(".header-button").hover(function()
	{
		do
		{
			random_color = colors[Math.floor(Math.random() * colors.length)];
			if ($(this).css("color") != "rgb(" + hexToR(random_color) + ", " + hexToG(random_color) + ", " + hexToB(random_color) + ")")
			{
				$(this).css("color", random_color);
				break;
			}
		}
		while(true);
	});
}
