<!DOCTYPE html>
<html>
<head>
    <title>Subject Mark Form</title>
</head>
<body>
    <h1>Add Marks</h1>

        @csrf
    
        <label for="student-name">Student Name:</label>
        <input type="text" id="student-name" name="student-name" required><br><br>
                
        <label for="subject-name">Subject Name:</label>
        <input type="text" id="subject-name" name="subject-name" required><br><br>

        <label for="subject-mark">Enter Mark:</label>
        <input type="text" id="subject-mark" name="subject-mark" required><br><br>

        <input type="submit" value="Add Mark">
    </form>
</body>
</html>
