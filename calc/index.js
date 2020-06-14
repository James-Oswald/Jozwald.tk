
//defaults constants
var width = 400, height = 400;
var xmin = -10, xmax = 10, xinc = 1;
var ymin = -10, ymax = 10, yinc = 1; 

//t vars
var tw = xmax * 2;
var rtmin = -tw, rtmax = tw, rtinc = 0.01;
var potmin = 0, potmax = tw, potinc = 0.001;
var patmin = -tw, patmax = tw, patinc = 0.001;

//dependant vars
var ippx; //graph value incriment per pixel x-axis 
var ippy; //graph value incriment per pixel y-axis
var ppix; //pixels per 1 graph incriment x-axis
var ppiy; //pixels per 1 graph incriment y-axis
var centx;
var centy;

//display vars
var canvas, context, fb, fbd;
var polar = false;
var inver = Math.floor(Math.random() * 2) == 0;
var rCol = getRandColor();

function genDependants()
{
	ippx = (xmax - xmin) / width; 
	ippy = (ymax - ymin) / height; 
	ppix = width * xinc / (xmax - xmin); 
	ppiy = height * yinc / (ymax - ymin);
	centx = Math.abs(ppix / xinc * xmin); 
	centy = Math.abs(ppiy / yinc * ymin);
}

function setUp()
{
	genDependants();
	canvas = document.getElementById("disp");
	canvas.width = width;
	canvas.height = height;
	context = canvas.getContext("2d");
	fb = context.createImageData(width, height);
	fbd = fb.data;
	clearGraph();
}

$(function()
{
	document.getElementById("widi").value = width;
	document.getElementById("higi").value = height;
	document.getElementById("xmini").value = xmin;
	document.getElementById("xmaxi").value = xmax;
	document.getElementById("xinci").value = xinc;
	document.getElementById("ymini").value = ymin;
	document.getElementById("ymaxi").value = ymax;
	document.getElementById("yinci").value = yinc;
	document.getElementById("rtmini").value = rtmin; 
	document.getElementById("rtmaxi").value = rtmax;
	document.getElementById("rtinci").value = rtinc;
	document.getElementById("potmini").value = potmin;
	document.getElementById("potmaxi").value = potmax;
	document.getElementById("potinci").value = potinc; 
	document.getElementById("patmini").value = patmin; 
	document.getElementById("patmaxi").value = patmax;
	document.getElementById("patinci").value = patinc;
	document.getElementById("inveri").checked = inver;
	document.getElementById("polari").checked = polar;
	setUp();
});

function changeSettings()
{
	width = document.getElementById("widi").value;
	height = document.getElementById("higi").value;
	xmin = document.getElementById("xmini").value;
	xmax = document.getElementById("xmaxi").value;
	xinc = document.getElementById("xinci").value;
	ymin = document.getElementById("ymini").value;
	ymax = document.getElementById("ymaxi").value;
	yinc = document.getElementById("yinci").value;
	rtmin = parseFloat(document.getElementById("rtmini").value);
	rtmax = parseFloat(document.getElementById("rtmaxi").value);
	rtinc = parseFloat(document.getElementById("rtinci").value);
	potmin = parseFloat(document.getElementById("potmini").value);
	potmax = parseFloat(document.getElementById("potmaxi").value);
	potinc = parseFloat(document.getElementById("potinci").value);
	patmin = parseFloat(document.getElementById("patmini").value);
	patmax = parseFloat(document.getElementById("patmaxi").value);
	patinc = parseFloat(document.getElementById("patinci").value);
	inver = document.getElementById("inveri").checked;
	polar = document.getElementById("polari").checked;
	setUp();
}

function placeBackground(i, j, b, l)
{
	if((i - centy) % ppix == 0 || (j - centx) % ppiy == 0)
	{
		setPixel(i, j, l, l, l);
	}
	else
	{
		setPixel(i, j, b, b, b);
	}
}

function drawBackground()
{
	var b = inver ? 0 : 255;
	var p = inver ? 255 : 0;
	var l = inver ? 150 : 150;
	if(polar)
	{
		for(var x = 0; x < width; x++)
		{
			for(var y = 0; y < height; y++)
			{
				setPixel(x, y, b, b, b);
			}
		}
		for(var i = 0; i < xmax * 2; i++)
		{
			for(var x = 0 - centx; x < width - centx; x++)
			{
				for(var y = 0 - centy; y < height - centy; y++)
				{
					if(Math.abs(Math.pow(x, 2) + Math.pow(y, 2) - Math.pow(i * ppix, 2)) < i * ppix)
					{
						setPixel(x + centx, -y + centy, l, l, l);
					}
				}
			}
		}
		for(var i = 0; i < Math.PI * 2; i += Math.PI / 6)
		{
			for(var x = 0 - centx; x < width - centx; x++)
			{
				for(var y = 0 - centy; y < height - centy; y++)
				{
					if(Math.abs((Math.sin(i) / Math.cos(i)) * x - y) < 0.6)
					{
						setPixel(x + centx, -y + centy, l, l, l);
					}
				}
			}
		}
	}
	else
	{
		for(var i = centy; i < centy * 2; i++)
		{
			for(var j = centx; j < centx * 2; j++)
			{
				placeBackground(i, j, b, l);
			}
		}
		for(var i = centy; i >= 0; i--)
		{
			for(var j = centx; j >= 0; j--)
			{
				placeBackground(i, j, b, l);
			}
		}
		for(var i = centy; i < centy * 2; i++)
		{
			for(var j = centy; j >= 0; j--)
			{
				placeBackground(i, j, b, l);
			}
		}
		for(var i = centy; i >= 0; i--)
		{
			for(var j = centx; j < centx * 2; j++)
			{
				placeBackground(i, j, b, l);
			}
		}
	}
	for(var i = 0; i < width; i++)
	{
		setPixel(centx, i, p, p, p);
	}
	for(var i = 0; i < height; i++)
	{
		setPixel(i, centy, p, p, p);
	}
}

function plot(x, y)
{
	var c = inver ? 20 : -50;
	if(x >= xmin && x <= xmax && y >= ymin && y <= ymax)
	{
		setPixel(Math.floor(x / ippx) + centx, -Math.floor(y / ippy) + centy, hexToR(rCol) + c, hexToG(rCol) + c, hexToB(rCol) + c);
	}
}

function setPixel(x, y, r, g, b)
{
	if(x < width && y < height)
	{
		loc = y * fb.width * 4 + x * 4;
		fbd[loc] = r;
		fbd[loc + 1] = g;
		fbd[loc + 2] = b;
		fbd[loc + 3] = 255;
	}
}

function swapFrame()
{
	context.putImageData(fb, 0, 0);
}

function clearGraph()
{
	console.log("clearing");
	drawBackground();
	swapFrame();
}

function graphRec()
{
	var xCont = document.getElementById("xr").value;
	xFunc = function(t){return t;};
	yFunc = function(t){var x = t; return eval(xCont);};
	graph(xFunc, yFunc, rtmin, rtmax, rtinc);
}

function graphPol()
{
	var rCont = document.getElementById("ri").value;
	xFunc = function(t){return eval(rCont) * Math.cos(t);};
	yFunc = function(t){return eval(rCont) * Math.sin(t);};
	graph(xFunc, yFunc, potmin, potmax, potinc);
}

function graphPara()
{
	var xCont = document.getElementById("xi").value;
	var yCont = document.getElementById("yi").value;
	xFunc = function(t){return eval(xCont);};
	yFunc = function(t){return eval(yCont);};
	graph(xFunc, yFunc, patmin, patmax, patinc);
}

function graph(xFunc, yFunc, tmin, tmax, tinc)
{
	try
	{
		for(var t = tmin; t < tmax; t += tinc)
		{
			plot(xFunc(t), yFunc(t));
		}
		document.getElementById("error").style = "display:none";
		swapFrame();
	}
	catch(e)
	{
		console.error(e.message);
		document.getElementById("error").style = "";
		document.getElementById("error-text").innerHTML = "The function you entered could not be evaluated, check for syntax errors and try again.<br>The evaluator returned the following error:&nbsp;<code>" + e.message + "</code>";
	}
}