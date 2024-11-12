<?php
// Database connection
$servername = "localhost"; // Replace with your server
$username = "shairo";        // Replace with your DB username
$password = "Iamshairojames29";            // Replace with your DB password
$dbname = "mydb"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Entry Form</title>
</head>
<body>
    <h2>Enter Your Information</h2>
    <form action="index.php" method="POST">
        <label for="fname">First Name:</label><br>
        <input type="text" id="fname" name="fname" required><br><br>
        
        <label for="mname">Middle Name:</label><br>
        <input type="text" id="mname" name="mname"><br><br>
        
        <label for="lname">Last Name:</label><br>
        <input type="text" id="lname" name="lname" required><br><br>
        
        <label for="age">Age:</label><br>
        <input type="number" id="age" name="age" required><br><br>
        
        <label for="address">Address:</label><br>
        <textarea id="address" name="address" required></textarea><br><br>
        
        <label for="course_and_sec">Course and Section:</label><br>
        <input type="text" id="cas" name="course_and_sec" required><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $course_and_sec = $_POST['cas'];

    // Insert data into the database
    $sql = "INSERT INTO d_form (fname, mname, lname, age, address, cas) 
            VALUES ('$fname', '$mname', '$lname', '$age', '$address', '$cas')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Entry Result</title>
</head>
<body>
    <h2>Form Submission Successful</h2>
    <p><a href="form.php">Go back to the form</a></p>
</body>
</html>
