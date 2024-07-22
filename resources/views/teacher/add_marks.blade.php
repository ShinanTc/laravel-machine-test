<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Marks</title>
</head>

<body>

<h1>Add Marks</h1>
@csrf

<label for="student-name">Student Name</label>
<input type="text" name="student-name" id="student-name" required><br><br>

<label for="subject-name">Subject Name</label>
<input type="text" name="subject-name" id="subject-name" required><br><br>

<label for="subject-mark">Enter Mark:</label>
<input type="text" name="subject-mark" id="subject-mark" required><br><br>

<input type="submit" value="Add Mark">

</form>
</body>


</html>