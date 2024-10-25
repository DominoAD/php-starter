<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sticky Footer Example</title>
    <style>
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Flexbox layout for the body */
        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        .content {
            flex: 1; /* This makes the content area grow to fill the available space */
        }

        .indexContent {
            /* Basic styling */
            background-color: #f0f0f0; /* Light grey background */
            color: #333; /* Dark text color */
            padding: 20px; /* Padding inside the section */
            margin: 20px auto; /* Center the section with auto margins */
            max-width: 800px; /* Maximum width of the section */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */

            /* Typography */
            font-family: Arial, sans-serif; /* Font family */
            line-height: 1.6; /* Line height for readability */
        }

        .indexContent h1, .indexContent h2, .indexContent h3 {
            color: #0056b3; /* Different color for headings */
        }

        .indexContent p {
            margin-bottom: 1em; /* Space between paragraphs */
        }

        .indexContent a {
            color: #0056b3; /* Link color */
            text-decoration: none; /* Remove underline from links */
        }

        .indexContent a:hover {
            text-decoration: underline; /* Underline on hover */
        }

        /* Responsive design */
        @media (max-width: 600px) {
            .indexContent {
                padding: 10px; /* Less padding on small screens */
                margin: 10px; /* Less margin on small screens */
            }
        }

        footer {
            background-color: #3b6a88;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>
<body>
    <div class="content">
        <section class="indexContent">
            <h1>Welcome to the Index</h1>
            <p>This is a sample section with some basic styling applied. You can add more content here as needed.</p>
            <p>For more information, visit <a href="#">this link</a>.</p>
        </section>
    </div>
    <footer>
        <p>Nova Scotia Community College 2023 ©</p>
    </footer>
</body>
</html>