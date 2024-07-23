<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Data</title>
</head>
<body>
<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Subject</th>
      <th>Marks</th>
      <th>Status</th>
      </tr>
  </thead>
  <tbody>
    @forelse ($studentsData as $student)
      <tr>
        <td>{{ $student['student_name'] }}</td>
        <td>{{ $student['subject_name'] }}</td>
        <td>{{ $student['marks'] }}</td>
        <td>{{ $student['status'] }}</td>
      </tr>
    @empty
      <!-- <tr>
        <td colspan="{{ count($students) > 0 ? count($students[0]) : 4 }}">No students found.</td>
      </tr> -->
    @endforelse
  </tbody>
</table>

</body>
</html>