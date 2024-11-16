<?php
// Set the page title
$title = "Job Descriptions - Viettel Group";
include 'header.inc'; // Include the header
include 'menu.inc';   // Include the menu
?>

<!-- Main Content Section -->
<main>
    <!-- Available Positions Section -->
    <section>
        <h1>Available Positions at Viettel Group</h1>
    </section>

    <!-- Job 1: Software Developer -->
    <article class="job-listing">
        <section class="sd">
            <h2>Software Developer</h2>
            <dl>
                <dt>Reference Number:</dt>
                <dd>SD123</dd>
                <dt>Position Title:</dt>
                <dd>Junior Software Developer</dd>
                <dt>Company:</dt>
                <dd>Viettel Group</dd>
                <dt>Salary Range:</dt>
                <dd>$55,000 - $75,000 per year</dd>
                <dt>Reports To:</dt>
                <dd>Senior Software Developer</dd>
            </dl>
            <h3>Key Responsibilities:</h3>
            <ul>
                <li>Develop, test, and maintain web applications and software systems.</li>
                <li>Collaborate with cross-functional teams to define, design, and implement new features.</li>
                <li>Debug and resolve technical issues in a timely manner.</li>
                <li>Participate in code reviews to improve code quality.</li>
            </ul>
            <h3>Required Qualifications:</h3>
            <h4>Essential:</h4>
            <ol>
                <li>Bachelor’s degree in Computer Science or related field.</li>
                <li>Experience with Java, Python, or JavaScript.</li>
                <li>1-2 years of software development experience.</li>
            </ol>
            <h4>Preferable:</h4>
            <ul>
                <li>Experience with front-end frameworks (React, Angular).</li>
                <li>Knowledge of cloud platforms (AWS, Azure).</li>
            </ul>
        </section>
    </article>

    <!-- Job 2: Data Scientist -->
    <article class="job-listing">
        <section>
            <h2>Data Scientist</h2>
            <dl>
                <dt>Reference Number:</dt>
                <dd>DS987</dd>
                <dt>Position Title:</dt>
                <dd>Senior Data Scientist</dd>
                <dt>Company:</dt>
                <dd>Viettel Group</dd>
                <dt>Salary Range:</dt>
                <dd>$85,000 - $120,000 per year</dd>
                <dt>Reports To:</dt>
                <dd>Chief Data Officer</dd>
            </dl>
            <h3>Key Responsibilities:</h3>
            <ul>
                <li>Analyze large datasets to uncover insights that support business decisions.</li>
                <li>Develop predictive models using machine learning.</li>
                <li>Present insights to stakeholders through reports.</li>
                <li>Collaborate with engineers to deploy models.</li>
            </ul>
            <h3>Required Qualifications:</h3>
            <h4>Essential:</h4>
            <ol>
                <li>Bachelor’s or Master’s degree in Data Science, Computer Science, or related fields.</li>
                <li>Experience with Python or R, and machine learning frameworks.</li>
                <li>Proficiency in data manipulation using Pandas and NumPy.</li>
            </ol>
            <h4>Preferable:</h4>
            <ul>
                <li>Experience with distributed computing (Hadoop, Spark).</li>
                <li>Familiarity with cloud platforms (AWS, Google Cloud).</li>
                <li>Data visualization skills (Matplotlib, Tableau).</li>
            </ul>
        </section>
    </article>

    <!-- Aside for additional information -->
    <aside>
        <h3>Subscribe to Job Alerts</h3>
        <p>Stay updated with <a class="post-link" href="https://viettelpost.com.vn/tuyen-dung/">the latest job postings.</a></p>
    </aside>
</main>

<?php include 'footer.inc'; // Include the footer ?>
