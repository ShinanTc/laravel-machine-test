<!DOCTYPE html>
<html>
<head>
    <title>Student Form</title>
</head>
<body>
    <h1>Student Information</h1>
    
    <form method="post" action="{{ route('added_student') }}">

        @csrf
    
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="standard">Standard:</label>
        <input type="text" id="standard" name="standard" required><br><br>
       
        <label for="password">Password:</label>
        <input type="text" id="password" name="password" required><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
