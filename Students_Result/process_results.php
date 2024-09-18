<?php

$results_file = "https://raw.githubusercontent.com/aminubalayabo/Students_Info/main/Student_Details/profile.txt";

// Try to read the file and handle potential errors
try {
  $results_data = file_get_contents($results_file);
  if ($results_data === false) {
    throw new Exception("Failed to read results file.");
  }
} catch (Exception $e) {
  echo "Error: " . $e->getMessage();
  exit;
}

// Parse the data into an array (adjust parsing logic as needed)
$lines = explode("\n", $results_data);
$headers = explode(",", trim($lines[0]));

$studentData = [];
for ($i = 1; $i < count($lines); $i++) {
  $row = explode(",", trim($lines[$i]));
  $student = [];

  for ($j = 0; $j < count($headers); $j++) {
    $student[$headers[$j]] = $row[$j];
  }

  // Calculate totals, grades, and other necessary data as needed
  // ...

  $studentData[] = $student;
}

// Encode the student data as JSON and output it to a JavaScript variable
echo '<script>var studentData = ' . json_encode($studentData) . ';</script>';
