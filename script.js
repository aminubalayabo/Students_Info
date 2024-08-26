document.getElementById('studentForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData();
    formData.append('admissionNumber', document.getElementById('admissionNumber').value);
    formData.append('name', document.getElementById('name').value);
    formData.append('email', document.getElementById('email').value);
    formData.append('passport', document.getElementById('passport').files[0]);

    fetch('/add-student', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        document.getElementById('studentForm').reset();
    })
    .catch(error => console.error('Error:', error));
});

function searchStudent() {
    const admissionNumber = document.getElementById('searchAdmissionNumber').value;
    
    fetch(`/search-student?admissionNumber=${admissionNumber}`)
    .then(response => response.json())
    .then(data => {
        const resultDiv = document.getElementById('searchResult');
        if (data.found) {
            resultDiv.innerHTML = `
                <h3>Student Information</h3>
                <p>Admission Number: ${data.student.admissionNumber}</p>
                <p>Name: ${data.student.name}</p>
                <p>Email: ${data.student.email}</p>
                <img src="${data.student.passportUrl}" alt="Student Passport" style="max-width: 200px;">
            `;
        } else {
            resultDiv.innerHTML = '<p>Student not found.</p>';
        }
    })
    .catch(error => console.error('Error:', error));
}