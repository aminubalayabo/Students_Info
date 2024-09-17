// Function to fetch data from GitHub repository (replace with your own fetching logic)
function fetchData(url, callback) {
  const xhr = new XMLHttpRequest();
  xhr.open('GET', url, true);
  xhr.onload = function() {
    if (xhr.status === 200) {
      callback(xhr.responseText);
    } else {
      console.error('Error    fetching data:', xhr.statusText);
    }
  };
  xhr.send();
}

// Function to calculate total score, grade, points, GP, etc.
function calculateStudentResult(data) {
  const result = { ...data };
  result.TotalScore = parseInt(data.CAScore) + parseInt(data.ExamsScore);
  const grade = calculateGrade(result.TotalScore);
  result.Grade = grade;
  result.Point = getPoint(grade);
  result.GradePoint = result.Point * result.CourseUnits;
  return result;
}

// Function to calculate grade based on marks
function calculateGrade(score) {
  if (score >= 70) {
    return 'A';
  } else if (score >= 60) {
    return 'B';
  } else if (score >= 50) {
    return 'C';
  } else if (score >= 45) {
    return 'D';
  } else if (score >= 40) {
    return 'E';
  } else {
    return 'F';   
  }
}

// Function to get point based on grade
function getPoint(grade) {
  switch (grade) {
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

// Function to display student results by admission number
function displayStudentResults(data, session) {
  const resultsContainer = document.getElementById('results');
  resultsContainer.innerHTML = `<h2>${session} Session Results</h2>`;
  const table = document.createElement('table');
  const tableHead = document.createElement('thead');
  const tableRow = document.createElement('tr');   

  tableRow.innerHTML = `
    <th>AdmissionNumber</th>
    <th>CourseCode</th>
    <th>CourseUnits</th>
    <th>CAScore</th>
    <th>ExamsScore</th>
    <th>TotalScore</th>
    <th>Grade</th>
    <th>Point</th>
    <th>GradePoint (GP)</th>
  `;
  tableHead.appendChild(tableRow);
