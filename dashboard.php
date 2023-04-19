<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page
    header('Location: my-account.php');
}

// If the user clicked the logout button, destroy the session and redirect to the home page
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <style>
            body {
                background-color: #f5f5f5;
                font-family: Arial, sans-serif;
            }

            .container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 50px;
            }

            .card {
                background-color: #fff;
                border-radius: 5px;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
                padding: 20px;
                margin-bottom: 20px;
            }

            h1 {
                font-size: 36px;
                margin-bottom: 20px;
            }

            h2 {
                font-size: 24px;
                margin-bottom: 10px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }

            table th, table td {
                padding: 10px;
                text-align: left;
                border-bottom: 1px solid #ccc;
            }

            table th {
                background-color: #f5f5f5;
                font-weight: normal;
                border-top: 1px solid #ccc;
            }

            .button {
                background-color: #4CAF50;
                color: #fff;
                border: none;
                border-radius: 5px;
                padding: 10px 20px;
                cursor: pointer;
                font-size: 16px;
            }

            .button:hover {
                background-color: #3e8e41;
            }
        </style>
    </head>
    <body>
        
        <div class="container">
            <h1>Welcome to your Dashboard</h1>

            <div class="card">
                <h2>Your Profile</h2>
                <p>Name: Reema Jaiswal</p>
                <p>Email: reemajais646@gmail.com</p>
                <a href="#" class="button">Edit Profile</a>
            </div>

            <div class="card">
                <h2>Recent Transactions</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2023-04-19</td>
                            <td>Electricity Bill</td>
                            <td>$100</td>
                        </tr>
                        <tr>
                            <td>2023-04-18</td>
                            <td>Internet Bill</td>
                            <td>$50</td>
                        </tr>
                    </tbody>
                </table>
                <a href="#" class="button">View All Transactions</a>
            </div>

            <div class="card">
                <h2>Loan Information</h2>
                <p>You have no active loans.</p>
                <a href="#" class="button">Apply for a Loan</a>
            </div>
        </div>
    </body>
</html>
