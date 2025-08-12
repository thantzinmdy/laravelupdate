<!DOCTYPE html>
<html>
<head>
    <title>Certificate of Completion</title>
    <style>
        body {
            font-family: 'Georgia', serif;
            text-align: center;
            padding: 50px;
            background: #f5f5f5;
        }
        .certificate-container {
            background: white;
            border: 10px solid #ccc;
            padding: 50px;
            max-width: 900px;
            margin: auto;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .certificate-title {
            font-size: 36px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 40px;
        }
        .certify-text {
            font-size: 18px;
            margin-bottom: 30px;
        }
        .student-name {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #2980b9;
        }
        .course-name {
            font-size: 22px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 20px;
        }
        .date {
            font-size: 16px;
            margin-bottom: 50px;
        }

        .signature {
            text-align: right;
            margin-top: 60px;
            font-size: 16px;
        }

        .signature-line {
            margin-bottom: 8px;
        }

        .signature-name {
            font-weight: bold;
            font-size: 18px;
            color: #34495e;
        }

        .signature-role {
            font-style: italic;
            font-size: 14px;
            color: #7f8c8d;
        }

        .download-btn {
            margin-top: 30px;
        }
         /* Logo styling */
        .logo {
            max-width: 150px; /* Controls the size of the logo */
            height: auto; /* Maintains the aspect ratio */
            border-radius: 50%; /* Makes the logo circular */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15); /* Adds a soft shadow for depth */
            margin-bottom: 30px; /* Adds space below the logo */
            transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth transition for hover effect */
        }

        .logo:hover {
            transform: scale(1.1); /* Grows the logo slightly when hovered */
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2); /* Enhances the shadow on hover */
        }
    </style>
</head>
<body>
    <div class="certificate-container">
        <!-- Add Logo Here -->
        <img src="{{ config('appsetting.basic.main_logo') }}" alt="Logo" class="logo">
        <div class="certificate-title">Certificate of Completion</div>
        <div class="certify-text">This certifies that</div>
        <div class="student-name">{{ $achievement->student->name }}</div>
        <div class="certify-text">has successfully completed the course</div>
        <div class="course-name">{{ $achievement->course->title }}</div>
        <div class="date">on {{\Carbon\Carbon::parse($achievement->enrollment_date)->format('F j, Y') }}</div>

        <div class="signature">
            <!-- <div class="signature-line">_________________________</div> -->
            <div class="signature-name">La Pyae</div>
            <div class="signature-role">(Learning For All)</div>
        </div>

         @if (!$pdfData)
        <!-- Download Button -->
        <a href="{{ route('frontend.user.certificate.download', $achievement->course->course_code) }}" class="download-btn">⬇ Download Certificate</a>
        @endif
    </div>
</body>
</html>

