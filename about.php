<?php
// Set the page title
$title = 'Group Information';
include 'header.inc'; // Include the header
include 'menu.inc';   // Include the menu
?> 

<body class="about">
    <section class="about_title">
        <h1>Group Information</h1>
    
        <!-- Definition List -->
        <dl>
            <dt>Group Name:</dt>
            <dd>Group</dd>

            <dt>Group ID:</dt>
            <dd>2</dd>

            <dt>Tutor's Name:</dt>
            <dd>Dr Trung Luu</dd>

            <dt>Course:</dt>
            <dd>COS10026-Computing Technology Inquiry Project</dd>
        </dl>

        <!-- Figure with an image -->
        <figure>
            <img class="image" src="styles/images/groupphoto.png" alt="Group Photo" width="100" height="100">
            <figcaption>Photo of our group</figcaption>
        </figure>

        <!-- Table with timetable -->
        <h2>Timetable</h2>
        <table class="timetable">
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Class</th>
            </tr>
            <tr>
                <td>Tuesday</td>
                <td>1:00 PM - 3:00 PM</td>
                <td>Introduction to Programming</td>
            </tr>
            <tr>
                <td>Wednesday</td>
                <td>1:00 PM - 3:00 PM</td>
                <td>Computer Systems</td>
            </tr>
            <tr>
                <td>Saturday</td>
                <td>7:00 AM - 11:00 AM</td>
                <td>Computing Technology Inquiry Project</td>
            </tr>
        </table>

        <!-- Mailto link -->
        <p>Contact us: 
            <a href="mailto:105508402@student.swin.edu.au">105508402@student.swin.edu.au</a>, 
            <a href="mailto:105543377@student.swin.edu.au">105543377@student.swin.edu.au</a>
        </p>

        <!-- Extra Information -->
        <h2>Group Profile</h2>
        <p>We are a group of web development students with expertise in programming languages such as HTML, CSS, JavaScript, and Python. We have worked on various projects, including website design and mobile app development.</p>

        <h3>Demographic Information</h3>
        <p>We come from different cities, bringing a unique blend of perspectives and skills.</p>

        <h3>Description of Our Hometowns</h3>
        <p>Each of us hails from diverse parts of the country, enriching our teamwork with cultural diversity.</p>

        <h3>Favorite Books, Music, and Films</h3>
        <ul>
            <li>Books: The Great Gatsby, 1984, To Kill a Mockingbird</li>
            <li>Music: Rock, Classical, Jazz</li>
            <li>Films: Inception, The Matrix, The Godfather</li>
        </ul>
    </section>

<?php include 'footer.inc'; // Include the footer ?>
