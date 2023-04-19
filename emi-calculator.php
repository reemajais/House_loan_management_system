<!DOCTYPE html>
<html>
<head>
	<title>EMI Calculator</title>
        <style>
            body {
	background-image: url('path/to/background-image.jpg');
	background-size: cover;
}

main {
	max-width: 800px;
	margin: 0 auto;
	padding: 40px;
	background-color: rgba(255, 255, 255, 0.8);
	box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

h1 {
	text-align: center;
	font-size: 36px;
	margin-bottom: 20px;
}

p {
	font-size: 18px;
	margin-bottom: 40px;
        text-align: center;
}

form {
	display: flex;
	flex-direction: column;
	align-items: center;
}

label {
	font-size: 18px;
}

input[type="number"],
input[type="submit"] {
	padding: 10px;
	font-size: 18px;
	margin-bottom: 20px;
	border-radius: 5px;
	border: none;
	box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

input[type="number"] {
	width: 100%;
	max-width: 400px;
}

input[type="submit"] {
	background-color: #007bff;
	color: #fff;
	width: 200px;
	cursor: pointer;
}

input[type="submit"]:hover {
	background-color: #0056b3;
}


        </style>
</head>
<body>
	<main>
		<h1>EMI Calculator</h1>
		<p>Calculate your monthly EMI payment for a home loan.</p>
		<form action="calculate-emi.php" method="POST">
			<label for="loan-amount">Loan Amount (in rupees):</label>
			<input type="number" id="loan-amount" name="loan-amount" required><br><br>

			<label for="interest-rate">Interest Rate (in percentage):</label>
			<input type="number" id="interest-rate" name="interest-rate" step="0.01" required><br><br>

			<label for="loan-tenure">Loan Tenure (in months):</label>
			<input type="number" id="loan-tenure" name="loan-tenure" required><br><br>

			<input type="submit" value="Calculate EMI">
		</form>
	</main>
  

</body>
</html>
