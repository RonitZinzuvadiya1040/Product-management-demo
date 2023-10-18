<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css">
</head>

<body class="bg-gray-900 text-white font-sans flex justify-center items-center h-screen">
    <div class="bg-gray-800 p-8 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-semibold mb-4">User Registration</h2>
        <form action="register.php" method="post">
            <div class="mb-4">
                <label for="firstname" class="block font-medium">First Name:</label>
                <input type="text" id="firstName" name="firstname" required class="w-full px-3 py-2 bg-gray-700 border rounded-lg focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="lastname" class="block font-medium">Last Name:</label>
                <input type="text" id="lastName" name="lastname" required class="w-full px-3 py-2 bg-gray-700 border rounded-lg focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="mobilenumber" class="block font-medium">Mobile Number:</label>
                <input type="tel" id="mobileNumber" name="mobilenumber" required class="w-full px-3 py-2 bg-gray-700 border rounded-lg focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="email" class="block font-medium">Email:</label>
                <input type="email" id="email" name="email" required class="w-full px-3 py-2 bg-gray-700 border rounded-lg focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-4 relative">
                <label for="password" class="block font-medium">Password:</label>
                <input type="password" id="password" name="password" required class="w-full px-3 py-2 bg-gray-700 border rounded-lg focus:outline-none focus:border-blue-500">
                <span class="absolute right-3 top-2 cursor-pointer text-blue-500 hover:text-blue-600" id="togglePassword">Show</span>
            </div>
            <div class="mb-4">
                <input type="submit" name="register" value="Register" id="register" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded-lg">
            </div>
        </form>
    </div>

    <script>
        const togglePassword = document.getElementById("togglePassword");
        const passwordInput = document.getElementById("password");

        togglePassword.addEventListener("click", function() {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                togglePassword.textContent = "Hide";
            } else {
                passwordInput.type = "password";
                togglePassword.textContent = "Show";
            }
        });
    </script>
</body>

</html>