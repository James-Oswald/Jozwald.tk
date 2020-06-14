<!DOCTYPE html>
<html>
	<head>
		<?php include "../globalresources/head.php";?>
		<title>JS Math Overveiw</title>
	</head>
	<body>
		<?php include "../globalresources/header.php";?>
		<table>
			<tr>
				<th>Operator:</th>
				<th>Symbol </th>
				<th>Example </th>
			</tr>
			<tr>
				<td>Addition:</td>
				<td>+</td>
				<td>a + b</td>
			</tr>
			<tr>
				<td>Subtraction:</td>
				<td>-</td>
				<td>a - b</td>
			</tr>
			<tr>
				<td>Multiplication:</td>
				<td>*</td>
				<td>a * b</td>
			</tr>
			<tr>
				<td>Division:</td>
				<td>/</td>
				<td>a / b</td>
			</tr>
			<tr>
				<td>Modular Division:</td>
				<td>%</td>
				<td>a % b</td>
			</tr>
				<tr>
				<td>Parenthesis</td>
				<td>()</td>
				<td>(a * b)</td>
			</tr>
		</table>
		<br/><br/>
		<table>
			<tr>
				<th>Functions of Math</th>
				<th>Example</th>
				<th>Example Evaluates to</th>
				<th>Description</th>
			</tr>
			<tr>
				<td>abs(x)</td>
				<td>abs(-5)</td>
				<td>5</td>
			<td>The absolute value of input parameter</td>
			</tr>
			<tr>
				<td>sqrt(x)</td>
				<td>Math.sqrt(16)</td>
				<td>4</td>
				<td>Returns the square root of input paramter</td>
			</tr>
			<tr>
				<td>pow(base, exponet)</td>
				<td>Math.pow(2, 2)</td>
				<td>4</td>
				<td>exponents ex Math.pow(x, 2) is x squared.</td>
			</tr>
			<tr>
				<td>cos(x)</td>
				<td>Math.cos(2 * Math.PI)</td>
				<td>1</td>
				<td>Trig function, returns cos of parameter</td>
			</tr>
			<tr>
				<td>sin(x)</td>
				<td>Math.sin(2 * Math.PI)</td>
				<td>0</td>
				<td>Trig function, returns sin of parameter</td>
			</tr>
			<tr>
				<td>tan(x)</td>
				<td>Math.tan(2 * Math.PI)</td>
				<td>0</td>
				<td>Trig function, returns tan of parameter</td>
			</tr>
			<tr>
				<td>rand()</td>
				<td>Math.rand() * 5</td>
				<td>a random number <br/> between 0-5</td>
				<td>generates a random decimal number between 0-1</td>
			</tr>
		</table>
		<p> To learn more about Java Script Math vist <a href="https://www.w3schools.com/jsref/jsref_obj_math.asp">W3Schools page</a> on it</p>
		<?php include "../globalresources/footer.php";?>
	</body>
</html>