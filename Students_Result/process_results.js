const resultsTable = document.getElementById('resultsTable');

function createTableRow(studentData) {
  const row = document.createElement('tr');

  // Add cells for each column
  for (const key in studentData) {
    const cell = document.createElement('td');
    cell.textContent = studentData[key];
    row.appendChild(cell);
  }

  return row;
}

studentData.forEach(student => {
  const row = createTableRow(student);
  resultsTable.appendChild(row);
});
