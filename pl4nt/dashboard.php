<?php
session_start();
if (!isset($_SESSION["username"])) {
header("Location: login.php");
exit();
}
include "dp.php";
$message = "";
$message_type = "success";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$full_name = trim($_POST["full_name"]);
$email = trim($_POST["email"]);
$contact = trim($_POST["contact"]);
$gender = $_POST["gender"];
$course = $_POST["course"];
// Basic server-side validation
if ($full_name == "" || !filter_var($email, FILTER_VALIDATE_EMAIL)
|| $contact == "" || $gender == "" || $course == "") {
$message = "Enter valid details in all fields.";
$message_type = "danger";
} else {
$sql = "INSERT INTO students
(full_name, email, contact, gender, course)
VALUES (?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param(
$stmt,
"sssss",
$full_name,
$email,
$contact,
$gender,
$course
);
if (mysqli_stmt_execute($stmt)) {
$message = "Student registered successfully!";
} else {
$message = "Error registering student.";
$message_type = "danger";
}
mysqli_stmt_close($stmt);
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Student Registration</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-dark bg-primary">
<div class="container">
<span class="navbar-brand">
Student Registration System
</span>
<div class="text-white">
Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>
<a href="logout.php" class="btn btn-danger btn-sm ms-3">
Logout
</a>
</div>
</div>
</nav>
<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-md-7">
<div class="card shadow">
    <div class="card-header bg-primary text-white">
<h4>Student Registration Form</h4>
</div>
<div class="card-body">
<?php if ($message != "") { ?>
<div class="alert alert-<?php echo $message_type; ?>">
<?php echo htmlspecialchars($message); ?>
</div>
<?php } ?>
<form method="POST" id="studentForm">
<div class="mb-3">
<label class="form-label">Full Name</label>
<input type="text" name="full_name" id="full_name"
class="form-control" required>
</div>
<div class="mb-3">
<label class="form-label">Email Address</label>
<input type="email" name="email" id="email"
class="form-control" required>
</div>
<div class="mb-3">
<label class="form-label">Contact Number</label>
<input type="text" name="contact" id="contact"
class="form-control" required>
</div>
<div class="mb-3">
<label class="form-label">Gender</label>
<select name="gender" class="form-select" required>
<option value="">Select Gender</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</div>
<div class="mb-3">
<label class="form-label">Course</label>
<select name="course" class="form-select" required>
<option value="">Select Course</option>
<option value="IT">Information Technology</option>
<option value="Software Development">
Software Development
</option>
<option value="Networking">
Computer Networking
</option>
</select>
</div>
<button type="submit" class="btn btn-success w-100">
Submit Registration
</button>
</form>
</div>
</div>
</div>
</div>
</div>
<script>
document.getElementById("studentForm").addEventListener("submit", function(event) {
    let name = document.getElementById("full_name").value.trim();
let email = document.getElementById("email").value.trim();
let contact = document.getElementById("contact").value.trim();
if (name == "" || email == "" || contact == "") {
alert("All fields must be completed.");
event.preventDefault();
}
else if (contact.length < 7) {
alert("Contact number must contain at least 7 characters.");
event.preventDefault();
}
else {
alert("Submitting student details...");
}
});
</script>
</body>
</html>