<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        a{
            text-decoration: none;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px;
            width: 300px;
            text-align: center;
            transition: transform 0.5s;
        }

        .card:hover {
            transform: scale(1.1);
        }

        .admin-card {
            background-color: #ff5733;
            color: #fff;
        }

        .user-card {
            background-color: #33b5ff;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="admin-login.php" class="card admin-card">
            <h2>Admin</h2>
            <p>Welcome, Admin! You have access to the admin dashboard.</p>
        </a>
        <a href="user-login.php" class="card user-card">
            <h2>User</h2>
            <p>Welcome, User! You have limited access to the user dashboard.</p>
        </a>
    </div>
</body>

</html>