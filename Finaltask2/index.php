<?php
include 'db.php';

$message = "";

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sql = "DELETE FROM students WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php?msg=deleted");
        exit();
    } else {
        $message = "Delete failed: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Student Records</h2>

<a href="add.php">Add New Student</a>
<br><br>

<?php
if (isset($_GET['msg']) && $_GET['msg'] == "deleted") {
    echo "<p style='color: green;'>Student deleted successfully.</p>";
}

if ($message != "") {
    echo "<p style='color: red;'>$message</p>";
}
?>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Registration Number</th>
        <th>Department</th>
        <th>Action</th>
    </tr>

    <?php
    $result = mysqli_query($conn, "SELECT * FROM students");

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['registration_no'] . "</td>";
        echo "<td>" . $row['department'] . "</td>";
        echo "<td>
                <a href='edit.php?id=" . $row['id'] . "'>Edit</a> |
                <a href='index.php?delete=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this student?\")'>Delete</a>
              </td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>