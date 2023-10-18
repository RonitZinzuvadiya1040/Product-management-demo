<?php    
    include "admin/session.php";
    include "navbar.php";
    include "alert.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <style>
        /* Basic CSS for the navbar */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        /* css for table */
        #admins {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #admins td,
        #admins th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #admins tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #admins th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

        h3 {
            text-align: center;
        }
    </style>
</head>

<body>
    <h3>Manage Users</h3>
    <hr>
    <table id="admins">
        <tr>
            <th>Company</th>
            <th>Contact</th>
            <th>Country</th>
        </tr>
        <tr>
            <td>Webmob</td>
            <td>Ronit Zinzuvadiya</td>
            <td>Ahmedabad</td>
        </tr>
        <tr>
            <td>Webmob</td>
            <td>Daksh Makawana</td>
            <td>Ahmedabad</td>
        </tr>
    </table>

    <!-- <script>

        // Check if the success message has been shown before
        if (!localStorage.getItem("successMessageShown")) {

            // Display the message
            var successMessage = document.getElementById("successMessage");
            successMessage.style.display = "block";

            // Set a flag to indicate that the message has been shown
            localStorage.setItem("successMessageShown", "true");
            showAlert();
        }
    </script> -->

</body>

</html>