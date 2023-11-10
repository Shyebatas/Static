<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<style>
    body {
        background-color: #f5f5f5;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .card {
        width: 400px;
        padding: 20px;
        border: none;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #343a40;
        color: #fff;
        text-align: center;
        padding: 10px 0;
        border-radius: 10px 10px 0 0;
    }

    .card-body {
        background-color: #fff;
        border-radius: 0 0 10px 10px;
        padding: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        font-weight: bold;
    }

    .btn-register {
        background-color: #343a40;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-register:hover {
        background-color: #23272b;
    }

    .login-link {
        text-align: center;
        margin-top: 15px;
    }

    .login-link a {
        text-decoration: none;
    }
</style>
<div class="card">
    <div class="card-header">
        <h2>Registration</h2>
    </div>
    <div class="card-body">
        <form action="<?= BASE_URL ?>welcome/register" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-register btn-block">Register</button>
        </form>
        <div class="login-link">
            <p>Already have an account? <a href="<?= BASE_URL ?>welcome/login">Login</a></p>
        </div>
    </div>
</div>
</body>
</html>
