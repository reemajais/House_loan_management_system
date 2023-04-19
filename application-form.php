<!DOCTYPE html>
<html>
<head>
	<title>Application Form</title>
        <style>
            body {
  font-family: Arial, sans-serif;
  background-color: #f8f8f8;
  margin: 0;
}

main {
  max-width: 800px;
  margin: 0 auto;
  background-color: #fff;
  padding: 40px;
  border-radius: 8px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

h1 {
  font-size: 36px;
  margin-bottom: 20px;
  text-align: center;
}

form {
  display: grid;
  grid-gap: 20px;
  margin-top: 30px;
}

label {
  display: block;
  font-size: 18px;
  font-weight: bold;
}

input[type="text"],
input[type="tel"],
input[type="number"],
input[type="file"],
textarea {
  width: 100%;
  padding: 10px;
  font-size: 16px;
  border-radius: 4px;
  border: 1px solid #ddd;
  transition: border-color 0.3s;
}

input[type="text"]:focus,
input[type="tel"]:focus,
input[type="number"]:focus,
input[type="file"]:focus,
textarea:focus {
  outline: none;
  border-color: #007bff;
}

input[type="radio"] + label {
  margin-right: 20px;
}

input[type="submit"] {
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 4px;
  padding: 10px 20px;
  font-size: 18px;
  cursor: pointer;
  transition: background-color 0.3s;
}

input[type="submit"]:hover {
  background-color: #0069d9;
}

input[type="reset"] {
  background-color: #fff;
  color: #007bff;
  border: 1px solid #007bff;
  border-radius: 4px;
  padding: 10px 20px;
  font-size: 18px;
  cursor: pointer;
  transition: color 0.3s, background-color 0.3s;
}

input[type="reset"]:hover {
  background-color: #007bff;
  color: #fff;
}

.error-message {
  color: red;
  font-size: 16px;
  margin-top: 5px;
}

@media screen and (max-width: 600px) {
  main {
    padding: 20px;
  }
}

        </style>

</head>
<body>
	
	<main>
		<h1>Loan Application Form</h1>
		<p>Please fill out the following form to apply for a home loan.</p>
		
		<form action="submit-application.php" method="POST" enctype="multipart/form-data">
			<label for="name">Name:</label>
			<input type="text" id="name" name="name" required><br><br>
			
			<label for="mobile">Mobile Number:</label>
			<input type="tel" id="mobile" name="mobile" required><br><br>
			
			<label for="pan">PAN Number:</label>
			<input type="text" id="pan" name="pan" required><br><br>
			
			<label for="pan-upload">Upload PAN Card (PDF):</label>
			<input type="file" id="pan-upload" name="pan-upload" accept=".pdf" required><br><br>
			
			<label for="address">Address:</label>
			<textarea id="address" name="address" required></textarea><br><br>
			
			<label for="income">Monthly Income:</label>
			<input type="number" id="income" name="income" required><br><br>
			
			<label for="existing-loan">Existing Loan:</label>
			<input type="radio" id="existing-loan-yes" name="existing-loan" value="yes">
			<label for="existing-loan-yes">Yes</label>
			<input type="radio" id="existing-loan-no" name="existing-loan" value="no" checked>
			<label for="existing-loan-no">No</label><br><br>
			
			<label for="loan-amount">Expected Loan Amount:</label>
			<input type="number" id="loan-amount" name="loan-amount" required><br><br>
			
			<label for="profile-photo">Profile Photo (JPG or PNG):</label>
			<input type="file" id="profile-photo" name="profile-photo" accept=".jpg,.png" required><br><br>
			
			<label for="tenure">Loan Tenure (in years):</label>
			<input type="number" id="tenure" name="tenure" required><br><br>
			
			<label for="guarantor-name">Guarantor Name:</label>
			<input type="text" id="guarantor-name" name="guarantor-name"><br><br>
			
			<label for="guarantor-mobile">Guarantor Mobile Number:</label>
			<input type="tel" id="guarantor-mobile" name="guarantor-mobile"><br><br>
			
			<label for="guarantor-email">Guarantor Email:</label>
			<input type="tel" id="guarantor-email" name="guarantor-email"><br><br>
                            
                        <label for="guarantor-address">Guarantor-Address:</label>
			<textarea id="guarantor-address" name="guarantor-address" required></textarea><br><br>
                        
                        <input type="submit" value="Submit">
                </form>
            </main>
    </body>
</html>