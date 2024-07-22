<body>
  <h1>Add Marks</h1>

  @csrf

  <div class="form-group">
    <label for="student_id">Student:</label>
    <select name="student_id" id="student_id" required>
      <option value="">Select Student</option>
      @foreach ($students as $student)
        <option value="{{ $student->id }}">{{ $student->name }}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="subject_id">Subject:</label>
    <select name="subject_id" id="subject_id" required>
      <option value="">Select Subject</option>
      @foreach ($subjects as $subject)
        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
      @endforeach
    </select>
  </div>

  <label for="subject_mark">Enter Mark:</label>
  <input type="text" id="subject_mark" name="subject_mark" required><br><br>

  <input type="submit" value="Add Mark">
</body>
