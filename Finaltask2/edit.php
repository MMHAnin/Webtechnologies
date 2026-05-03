<?php
include 'db.php';

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM students WHERE id = $id");
$row = mysqli_fetch_assoc($result);

$message = "";

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];

    $sql = "UPDATE students 
            SET name = '$name', email = '$email', department = '$department'
            WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        $message = "Student updated successfully.";
        
        $result = mysqli_query($conn, "SELECT * FROM students WHERE id = $id");
        $row = mysqli_fetch_assoc($result);
    } else {
        $message = "Update failed: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Edit Student Record</h2>

<?php
if ($message != "") {
    echo "<p style='color: green;'>$message</p>";
}
?>

<form method="POST">
    <label>Student Name:</label><br>
    <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>

    <label>Department:</label><br>
    <input type="text" name="department" value="<?php echo $row['department']; ?>" required><br><br>

    <input type="submit" name="update" value="Update Student">
</form>

<br>
<a href="index.php">Back to Student List</a>

</body>
</html>