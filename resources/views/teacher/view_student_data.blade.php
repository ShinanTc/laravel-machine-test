<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Data</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    <tbody id="student-data-body">
      @forelse ($studentsData as $student)
        <tr class="student-data">
          <td>{{ $student['student_name'] }}</td>
          <td>{{ $student['subject_name'] }}</td>
          <td>{{ $student['marks'] }}</td>
          <td>{{ $student['status'] }}</td>
        </tr>
      @empty
        <tr>
          <td colspan="{{ count($students) > 0 ? count($students[0]) : 4 }}">No students found.</td>
        </tr>
      @endforelse
    </tbody>
  </table>

  <button id="filter-pass">Filter By Pass</button>
  <button id="filter-fail">Filter By Fail</button>
  <button id="filter-all">Show All</button>
  <script>
    $(document).ready(function() {
      // Filter students based on status ("pass")
      $('#filter-pass').click(function() {
        $('.student-data').hide(); // Hide all initially
        $('.student-data').filter(function() {
          return $(this).find('td:last-child').text() === 'pass';
        }).show(); // Show only matching rows
      });

      // Filter students based on status ("fail")
      $('#filter-fail').click(function() {
        $('.student-data').hide(); // Hide all initially
        $('.student-data').filter(function() {
          return $(this).find('td:last-child').text() === 'fail';
        }).show(); // Show only matching rows
      });

      // Show all students again (optional)
      $('#filter-all').click(function() {
        $('.student-data').show(); // Show all rows
      });
    });
  </script>
</body>
</html>
