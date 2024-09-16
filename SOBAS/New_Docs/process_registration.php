<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $file_path = "C:\\xampp\\htdocs\\Student_Information_System\\Students_Profile.txt";
    // Check if the user already exists
    $existing_data = file_get_contents($file_path);
    $lines = explode("\n", $existing_data);
    foreach ($lines as $line) {
        $fields = explode(",", $line);
        if ($fields[0] == $_POST['username'] || $fields[1] == $_POST['password']) {
            echo "User already exists";
            exit;
        }
    }

    // $serial = $_POST["serial"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $department = $_POST["department"];
    $level = $_POST["level"];
    $session = $_POST["session"];
    $phone_number = $_POST["phone_number"];
    $email = $_POST["email"];
    // $course = $_POST["course"];
    // $course = $_POST["course"];
    // $course = $_POST["course"];
    // Simple input validation
    if (empty($username) || empty($password)) {
        die("Error: All fields are required.");
    }

    // Create the data string
    $data = "$username,$password,$name,$department,$level,$session,$phone_number,$email\n";
    // $data = "$username|$password|$name|$department|$level|$session|$phone_number|$email\n";

    // Define the file path
    $file_path = "C:\\xampp\\htdocs\\Student_Information_System\\Students_Profile.txt";

    // Append the data to the file
    if (file_put_contents($file_path, $data, FILE_APPEND | LOCK_EX) !== false) {
        echo "Registration successful. <a href='registration_form.php'>Register another student</a>";
    } else {
        echo "Error: Unable to save data. Please try again.";
    }
} else {
    // If someone tries to access this page directly, redirect them to the form
    header("Location: registration_form.php");
    exit();
}
?>