<!DOCTYPE html>
<html>
<head>
    <title>Subject Form</title>
</head>
<body>
    <h1>Subject Information</h1>
    <form method="post" action="{{ route('added_subject') }}">

        @csrf
    
        <label for="name">Subject Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <input type="submit" value="Add Subject">
    </form>
</body>
</html>
