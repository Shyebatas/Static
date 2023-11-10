<?php defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .table {
            background-color: #fff;
        }

        .table th {
            background-color: #343a40;
            color: #fff;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f8f9fa;
        }

        h2 {
            color: #343a40;
            text-align: center;
        }

        .btn-edit {
            background-color: #007bff;
            color: #fff;
            border: none;
        }

        .btn-edit:hover {
            background-color: #0056b3;
        }

        .btn-delete {
            background-color: #dc3545;
            color: #fff;
            border: none;
        }

        .btn-delete:hover {
            background-color: #b62a35;
        }

        .btn-logout {
            background-color: #343a40;
            color: #fff;
            border: none;
        }

        .btn-logout:hover {
            background-color: #23272b;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>List of Registered Users</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Number</th>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_SESSION['registered_users']) && isset($_SESSION['registered_emails'])) {
                $userNumber = 1;
                foreach ($_SESSION['registered_users'] as $index => $username) {
                    if (isset($_SESSION['registered_emails'][$index])) {
                        $email = $_SESSION['registered_emails'][$index];
                        echo "<tr>";
                        echo "<td>$userNumber</td>";
                        echo "<td>$username</td>";
                        echo "<td>$email</td>";
                        echo "<td>";
                        
                        // Edit button
                        echo "<a href='?edit=$index' class='btn btn-edit'>Edit</a>";
                        echo " ";
                        
                        // Delete button
                        echo "<a href='?delete=$index' class='btn btn-delete'>Delete</a>";
                        
                        echo "</td>";
                        echo "</tr>";
                        $userNumber++;
                    }
                }
            } else {
                echo "<tr><td colspan='4'>No registered users found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <form action="logout" method="post">
        <button type="submit" class="btn btn-logout btn-block">Logout</button>
    </form>
</div>
</body>
</html>
