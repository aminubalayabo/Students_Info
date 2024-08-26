const express = require('express');  
const mysql = require('mysql');  
const app = express();  
const port = 3000;  

const connection = mysql.createConnection({  
    host: 'localhost',  
    user: 'root',  
    password: '',  
    database: 'schoolmanagementsystemdb'  
});  

connection.connect((err) => {  
    if (err) {  
        console.error('Cannot connect to the database:', err);  
        return;  
    }  
    console.log('Connected to the database');  
});  

app.get('/connect', (req, res) => {  
    res.json({ message: 'Connected to the database successfully!' });  
});  

app.listen(port, () => {  
    console.log(`Server running at http://localhost:${port}`);  
});