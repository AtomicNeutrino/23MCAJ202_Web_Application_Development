<?php
// Initialize variables to store form data and error messages
$fullName = $email = $gender = $dob = $password = $confirmPassword = "";
$fullNameErr = $emailErr = $genderErr = $dobErr = $passwordErr = $confirmPasswordErr = "";
$successMessage = ""; // Store success message

// Process the form when it's submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate Full Name
    if (empty($_POST["fullName"])) {
        $fullNameErr = "Full Name is required";
    } else {
        $fullName = test_input($_POST["fullName"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $fullName)) {
            $fullNameErr = "Only letters and white space are allowed";
        }
    }

    // Validate Email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Validate Gender
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }

    // Validate Date of Birth
    if (empty($_POST["dob"])) {
        $dobErr = "Date of Birth is required";
    } else {
        $dob = test_input($_POST["dob"]);
        // You might want to add more specific date format validation here (e.g., using strtotime)
    }

    // Validate Password
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
        if (strlen($password) < 6) {
            $passwordErr = "Password must be at least 6 characters long";
        }
        // In a real application, you would add more complex password strength checks here
    }

    // Validate Confirm Password
    if (empty($_POST["confirmPassword"])) {
        $confirmPasswordErr = "Please confirm your password";
    } else {
        $confirmPassword = test_input($_POST["confirmPassword"]);
        if ($confirmPassword !== $password) {
            $confirmPasswordErr = "Passwords do not match";
        }
    }

    // If no errors, proceed with form submission
    if (empty($fullNameErr) && empty($emailErr) && empty($genderErr) && empty($dobErr) && empty($passwordErr) && empty($confirmPasswordErr)) {
        // In a real application, you would:
        // 1. Connect to your database.
        // 2. Check if the email already exists.
        // 3. Hash the password securely using password_hash().
        // 4. Insert the user data (including $fullName, $email, $gender, $dob, and the hashed password) into the database.
        // 5. Redirect the user to a success page or display a more persistent success message.
        $successMessage = "Registration successful!";
    }
}

// Function to sanitize input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        /* Basic CSS for styling the form */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: lightblue;
            font-family: sans-serif;
            flex-direction: column;
        }

        /* Popup Notification (Above the form) */
        .popup {
            display: none;
            position: fixed;
            top: 10%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 15px 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            z-index: 1000;
            font-size: 18px;
            font-weight: bold;
            color: green;
            border: 2px solid green;
            animation: fadeIn 0.5s ease-in-out;
        }

        .popup button {
            margin-top: 10px;
            background-color: #007bff;
            color: white;
            padding: 8px 12px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .popup button:hover {
            background-color: #0056b3;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                top: 0%;
            }
            to {
                opacity: 1;
                top: 10%;
            }
        }

        .form-container {
            background-color: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            margin-top: 50px; /* To give space for popup */
        }

        h2 {
            font-weight: 700;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-size: 18px;
            font-weight: 500;
            font-family: sans-serif;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="email"], input[type="password"], input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
            margin-bottom: 15px; /* Increased margin for better spacing */
            box-sizing: border-box; /* Ensure padding doesn't increase the input's overall width */
        }

        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }

        button {
            margin-top: 20px;
            padding: 12px;
            border: none;
            background-color: rgb(255, 102, 0);
            color: white;
            font-size: 18px;
            font-weight: 500;
            font-family: sans-serif;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: rgb(230, 90, 0);
        }
    </style>
</head>
<body>

<div id="popup" class="popup">
    <p id="popupMessage"></p>
    <button onclick="closePopup()">OK</button>
</div>

<div class="form-container">
    <h2>Registration Form</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return showPopup('<?php echo $successMessage; ?>')">
        <label for="fullName">Full Name:</label>
        <input type="text" name="fullName" value="<?php echo $fullName; ?>">
        <span class="error"><?php echo $fullNameErr; ?></span>

        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php echo $email; ?>">
        <span class="error"><?php echo $emailErr; ?></span>

        <label for="gender">Gender:</label>
        <select name="gender">
            <option value="">Select Gender</option>
            <option value="male" <?php if ($gender == "male") echo "selected"; ?>>Male</option>
            <option value="female" <?php if ($gender == "female") echo "selected"; ?>>Female</option>
            <option value="other" <?php if ($gender == "other") echo "selected"; ?>>Other</option>
        </select>
        <span class="error"><?php echo $genderErr; ?></span>

        <label for="dob">Date of Birth:</label>
        <input type="date" name="dob" value="<?php echo $dob; ?>">
        <span class="error"><?php echo $dobErr; ?></span>

        <label for="password">Password:</label>
        <input type="password" name="password">
        <span class="error"><?php echo $passwordErr; ?></span>

        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" name="confirmPassword">
        <span class="error"><?php echo $confirmPasswordErr; ?></span>

        <button type="submit">Register</button>
    </form>
</div>

<script>
    // Function to display a popup message
    function showPopup(message) {
        if (message) {
            document.getElementById('popupMessage').innerText = message;
            document.getElementById('popup').style.display = 'block';
            return false; // Prevent form from the default submission
        }
        return true; // Allow form submission if there are errors
    }

    // Function to close the popup and optionally refresh the page
    function closePopup() {
        document.getElementById('popup').style.display = 'none';
        window.location.href = "<?php echo $_SERVER['PHP_SELF']; ?>"; // Refresh the page
    }
</script>

</body>
</html>