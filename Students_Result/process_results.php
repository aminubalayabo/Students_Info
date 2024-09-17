<?php
$results_file = "https://raw.githubusercontent.com/aminubalayabo/Students_Info/master/Students_Result/Results.txt";

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

// Rest of the code remains the same...
$data = [];

// Function to calculate letter grade based on total score
function getLetterGrade($score) {
  if ($score >= 70) {
    return 'A';
  } else if ($score >= 60) {
    return 'B';
  } else if ($score >= 50) {
    return 'C';
  } else if ($score >= 45) {
    return 'D';
  } else if ($score >= 40) {
    return 'E';
  } else {
    return 'F';   
  }
}

// Function to calculate weighted grade point
function getWeightedGradePoint($grade) {
  switch ($grade) {
    case 'A':
      return 5;
    case 'B':
      return 4;
    case 'C':
      return 3;
    case 'D':
      return 2;
    case 'E':
      return 1;
    default:
      return 0;
  }
}

// Read the results file from GitHub
$results_data = file_get_contents($results_file);

// Parse data into an array
$lines = explode("\n", $results_data);
$headers = explode(",", trim($lines[0]));

for ($i = 1; $i < count($lines); $i++) {
  $row = explode(",", trim($lines[$i]));
  $student = [];

  for ($j = 0; $j < count($headers); $j++) {
    $student[$headers[$j]] = $row[$j];
  }

  // Calculate total score, letter grade, and weighted grade point for each course
  $student['Totalscore'] = $student['CAscore'] + $student['Examscore'];
  $student['Grade'] = getLetterGrade($student['Totalscore']);
  $student['GradePoint'] = getWeightedGradePoint($student['Grade']);

  $data[] = $student;
}

// Calculate session totals and GPAs
$sessions = [];
foreach ($data as $student) {
  $session = $student['Session'];
  if (!isset($sessions[$session])) {
    $sessions[$session] = [
      'UTS' => 0, // Total Units Registered (Session)
      'GPTS' => 0, // Grade Points (Session)
      'GPALS' => 0, // Grade Point Average (Session)
    ];
  }

  $sessions[$session]['UTS'] += $student['Courseunits'];
  $sessions[$session]['GPTS'] += $student['GradePoint'] * $student['Courseunits'];
}

foreach ($sessions as $session => &$session_data) {
  $session_data['GPALS'] = $session_data['UTS'] > 0 ? $session_data['GPTS'] / $session_data['UTS'] : 0;
}

// Calculate overall UTD, GPTD, and GPATD
$UTD = 0;
$GPTD = 0;
foreach ($sessions as $session_data) {
  $UTD += $session_data['UTS'];
  $GPTD += $session_data['GPTS'];
}

$GPATD = $UTD > 0 ? $GPTD / $UTD : 0;

?>

<table>
  <thead>
    <tr>
      <th>S/N</th>
      <th>Admission No</th>
      <?php foreach ($headers as $header
