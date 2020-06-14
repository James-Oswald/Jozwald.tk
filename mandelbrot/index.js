
var c, cc;
//var d, id;

$(function() 
{
    c = document.getElementById("disp");
	var cw = window.getComputedStyle(c.parentElement).width;
	c.width = cw.substr(0, cw.length - 2) / 2;
	c.height = c.width * (3/4);
	cc = c.getContext("2d");
	//id = cc.createImageData(1, 1);
	//d = id.data;
});

function setPixel(x, y, r, g ,b)
{
	/*d[0] = r;
	d[1] = g;
	d[2] = b;
	d[3] = 255;
	cc.putImageData(id, x, y);*/
	cc.fillStyle = "rgb(" + r + "," + g + "," + b + ")";
	cc.fillRect(x, y, 1, 1);
}   

function drawSet()
{
	var iter = parseFloat(document.getElementById("iter").value);
	var zoom = parseFloat(document.getElementById("zoom").value);
	var xCent = parseFloat(document.getElementById("xCent").value);
	var yCent = parseFloat(document.getElementById("yCent").value);
	var width = c.width;
	var height = c.height;
	var id = cc.createImageData(width, height);
	var d = id.data;
	var domL = xCent - (1 / zoom);
	var domR = xCent + (1 / zoom);
	var ranT = yCent + (1 / zoom);
	var ranB = yCent - (1 / zoom);
	console.log(domL + " " + domR + " " + " " + ranT + " " + ranB+ " " + " " + xCent + " " + yCent + " " + zoom);
	var yf = ((ranT - ranB) / (height - 1));
	var xf = ((domR - domL) / (width - 1));
	var cx, cy, inside, zx, zy, zx2, zy2, l, x, y, i, ci;
	cc.clearRect(0, 0, width, height);
	for(l = 0; l < iter; l++)
	{
		for(x = 0; x < width; x++)
		{
			cx = domL + x * xf;
			for(y = 0; y < height; y++)
			{
				cy = ranT - y * yf;
				inside = true;
				zx = cx;
				zy = cy;
				for(i = 0; i < l; i++)
				{
					zx2 = zx * zx;
					zy2 = zy * zy;
					if(zx2 + zy2 > 4)
					{
						inside = false;
						break;
					}
					zy = 2 * zx * zy + cy;
					zx = zx2 - zy2 + cx;
				}
				if(inside)
				{
					ci = (width * 4 * y) + (x * 4);
					if(l == iter - 1)
					{
						d[ci] = 0;
						d[ci + 1] = 0;
						d[ci + 2] = 0;
						d[ci + 3] = 255;
						//setPixel(x, y, 0, 0, 0);
					}
					else
					{
						d[ci] = l * 10 % 255;
						d[ci + 1] = l * 15 % 255;
						d[ci + 2] = l * 20 % 255;
						d[ci + 3] = 255;
						//setPixel(x, y, l * 10 % 255, 0, 0);
					}
				}
			}
		}
	}
	cc.putImageData(id, 0, 0);
	console.log("done");
}