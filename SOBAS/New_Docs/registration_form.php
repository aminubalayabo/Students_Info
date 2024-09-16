<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 500px; margin: 0 auto; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], input[type="password"] { width: 100%; padding: 8px; box-sizing: border-box; }
        input[type="submit"] { background-color: #4CAF50; color: white; padding: 10px 15px; border: none; cursor: pointer; }
        input[type="submit"]:hover { background-color: #45a049; }
    </style>
</head>
<body>
    <h2>Student Registration Form</h2>
    <form action="process_registration.php" method="post">
        <!-- <div class="form-group">
            <label for="serial">Serial Number:</label>
            <input type="text" id="serial" name="serial" required>
        </div> -->
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        

        <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>
    </div>
    <div class="form-group">
    <label for="department">Department:</label>
    <input type="text" id="department" name="department" required><br><br>
    </div>
    <div class="form-group">
    <label for="level">Level:</label>
    <input type="text" id="level" name="level" required><br><br>
    </div>
    <div class="form-group">
    <label for="session">Session:</label>
    <input type="text" id="session" name="session" required><br><br>
    </div>
    <div class="form-group">
    <label for="phone_number">Phone Number:</label>
    <input type="tel" id="phone_number" name="phone_number" required><br><br>
    </div)
    <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
    <div>

<!-- <div class="form-group">
    <div id="course">
      <h3>Courses</h3>
      <div id="course"></div>
      <button type="button" onclick="addCourse()">Add Course</button>
    </div>
</div>         -->
        <input type="submit" value="Register">
    </form>
    
<!-- <script>
    let courseCount = 0;

function addCourse() {
  courseCount++;
  const courseDiv = document.createElement('div');
  courseDiv.className = 'course';
  courseDiv.innerHTML = `
    <input type="text" id="course${courseCount}code" placeholder="Course ${courseCount} Code" required>
    <input type="text" id="course${courseCount}title" placeholder="Course ${courseCount} Title" required>
    <input type="number" id="course${courseCount}units" placeholder="Course ${courseCount} Units" min="1" max="6" required>
  `;
  document.getElementById('course').appendChild(courseDiv);
}
</script> -->



</body>
</html>
