<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progress Card</title>
</head>
<body>
<table>
  <thead>
    <tr>
      <th>Subject Name</th>
      <th>Marks</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    @if (!empty($studentData))
      @foreach ($studentData as $subject)
        <tr>
          <td>{{ $subject['subject_name'] }}</td> <td>{{ $subject['marks'] }}</td>
            <td>{{ $subject['status'] }}</td>
          </td>
        </tr>
      @endforeach
    @else
      <tr>
        <td colspan="3">No data available.</td>
      </tr>
    @endif
  </tbody>
</table>
    
</body>
</html>