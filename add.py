# For adding a student
def add_student(request):
    admission_number = request.form['admissionNumber']
    name = request.form['name']
    email = request.form['email']
    passport = request.files['passport']

    # Save info to CSV
    with open('students.csv', 'a') as f:
        f.write(f"{admission_number},{name},{email}\n")

    # Save passport photo
    passport.save(f"SOBAS/{admission_number}.jpg")

    return json_response({"message": "Student added successfully"})

# For searching a student
def search_student(request):
    admission_number = request.query_params['admissionNumber']

    # Search in CSV
    with open('students.csv', 'r') as f:
        for line in f:
            data = line.strip().split(',')
            if data[0] == admission_number:
                return json_response({
                    "found": True,
                    "student": {
                        "admissionNumber": data[0],
                        "name": data[1],
                        "email": data[2],
                        "passportUrl": f"/SOBAS/{admission_number}.jpg"
                    }
                })

    return json_response({"found": False})