<!DOCTYPE html>
<html>

<head>
  <style>
    /* Styling for the alert message */
    .alert {
      background-color: #4CAF50;
      /* Green background color */
      color: white;
      text-align: center;
      padding: 10px;
      z-index: 1;
    }
  </style>
</head>

<body>
  <div class="alert" id="alert">
    Login Successful !!
  </div>

  <script>
    // Function to show the alert message and automatically hide it after a specified time (in milliseconds)
    function showAlert() {
      var alertElement = document.getElementById('alert');
      alertElement.style.display = 'block';

      // Set the time (in milliseconds) after which the alert will be automatically hidden
      var hideTimeout = 1000; // Change this value as needed

      // Hide the alert after the specified time
      setTimeout(function() {
        alertElement.style.display = 'none';
      }, hideTimeout);
    }

    // Call the showAlert function when the login is successful
    // You can trigger this function when the user successfully logs in
    showAlert();
  </script>
</body>

</html>