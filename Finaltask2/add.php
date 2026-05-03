<?php
include 'db.php';

$message = "";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $registration_no = $_POST['registration_no'];
    $department = $_POST['department'];

    $sql = "INSERT INTO students (name, email, registration_no, department)
            VALUES ('$name', '$email', '$registration_no', '$department')";

    if (mysqli_query($conn, $sql)) {
        $message = "Student added successfully.";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Add New Student</h2>

<p><?php echo $message; ?></p>

<form method="POST">
    <label>Student Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Registration Number:</label><br>
    <input type="text" name="registration_no" required><br><br>

    <label>Department:</label><br>
    <input type="text" name="department" required><br><br>

    <input type="submit" name="submit" value="Add Student">
</form>

<br>
<a href="index.php">View Students</a>

</body>
</html>