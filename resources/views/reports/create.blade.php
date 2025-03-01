<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin: auto;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #3498db;
            color: white;
            padding: 10px 15px;
            border: none;
            margin-top: 15px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create Report</h2>

      
    
        <form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            

           <label>Program Title</label>
<select name="title" id="program_title" required>
    <option value="">Select a Title</option>
    @foreach($programs as $program)
        <option value="{{ $program->title }}" data-programid="{{ $program->programid }}">
            {{ $program->title }}
        </option>
    @endforeach
</select>

<label>Program ID</label>
<input type="text" id="program_id" name="programid" value="{{ $program_id }}" readonly>

            
            <label>Username</label>
            <input type="text" name="username" value="{{ $username }}" readonly>
            
            <label>School</label>
            <input type="text" name="school" required>
            
            <label>Activity Name</label>
            <input type="text" name="activity_name" required>
            
            <label>Number of Girls</label>
            <input type="number" name="girls" required>
            
            <label>Number of Boys</label>
            <input type="number" name="boys" required>
            
            <label>Teacher</label>
            <input type="text" name="teacher" required>
            
            <label>Due Date</label>
            <input type="date" name="due_date" required>
            
            <label>Basic Description</label>
            <textarea name="basic_description" rows="4" required></textarea>
            
            <label>Google Photo</label>
            <input type="url" name="google_photo" required>
            
            <label>Hero Pic</label>
            <input type="file" name="hero_pic" accept="image/*" required>
            
            <button type="submit">Submit Report</button>
        </form>
           <!-- Back to Programs Button -->
    <a href="{{ route('program') }}" style="display: inline-block; background-color: #e74c3c; color: white; 
        padding: 10px 15px; text-decoration: none; border-radius: 4px; margin-bottom: 15px;">
        ← Back to Programs
    </a>
    </div>
</body>
</html>
