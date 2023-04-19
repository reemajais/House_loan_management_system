<!DOCTYPE html>
<html>
<head>
	<title>EMI Calculator</title>
</head>
<body>
	
	<main>
		<h1>EMI Calculator</h1>
		<p>Enter the following details to calculate your EMI.</p>
		
		<form action="calculate-emi.php" method="POST">
			<label for="loan-amount">Loan Amount:</label>
			<input type="number" id="loan-amount" name="loan-amount" required><br><br>
			
			<label for="interest-rate">Interest Rate (per annum):</label>
			<input type="number" id="interest-rate" name="interest-rate" step="0.01" required><br><br>
			
			<label for="tenure">Loan Tenure (in months):</label>
			<input type="number" id="tenure" name="tenure" required><br><br>
			
			<input type="submit" value="Calculate EMI">
		</form>

		<?php
		if (isset($_POST['loan-amount']) && isset($_POST['interest-rate']) && isset($_POST['tenure'])) {
		    $loan_amount = $_POST['loan-amount'];
		    $interest_rate = $_POST['interest-rate'];
		    $tenure = $_POST['tenure'];

		    $monthly_interest_rate = $interest_rate / (12 * 100);
		    $emi = ($loan_amount * $monthly_interest_rate * pow((1 + $monthly_interest_rate), $tenure)) / (pow((1 + $monthly_interest_rate), $tenure) - 1);

		    echo "<h2>EMI Calculation Results</h2>";
		    echo "<p>Loan Amount: Rs. " . number_format($loan_amount) . "</p>";
		    echo "<p>Interest Rate: " . number_format($interest_rate, 2) . "%</p>";
		    echo "<p>Loan Tenure: " . $tenure . " months</p>";
		    echo "<p>EMI: Rs. " . number_format($emi, 2) . "</p>";
		}
		?>
		
	</main>
	
</body>
</html>
