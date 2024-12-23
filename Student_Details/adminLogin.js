// GitHub repository details
const owner = 'aminubalayabo';
const repo = 'aminubalayabo.github.io';
const path = 'Students_Info/Student_Details/adminDetails.txt';

document.getElementById('loginForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    try {
        const response = await axios.get(`https://api.github.com/repos/${owner}/${repo}/contents/${path}`);
        // const response = await axios.get(`https://raw.githubusercontent.com/aminubalayabo/Students_Info/refs/heads/main/Student_Details/adminDetails.txt`);
        const content = atob(response.data.content);
        const lines = content.split('\n');

        for (let line of lines) {
            const fields = line.split(':');
            if (fields[0] === username && fields[1] === password) {
                // Login successful
                sessionStorage.setItem('currentUser', JSON.stringify(fields));
                // window.location.href = 'profile.html';
                // window.location.href = 'studentDashboard.html';
                window.location.href = 'https://aminubalayabo.github.io/Students_Info/Student_Details/view1.html'; 
                return;
            }
        }

        alert('Invalid username or password');
    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred during login');
    }
});
