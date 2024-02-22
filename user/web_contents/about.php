<?php
require_once('../php_script/db_local_connection.php');
$sql = "SELECT text, image_url, video_url, embed_code FROM createpost";
$result = $db->query($sql);

$announcementPaths = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $url = !empty($row["image_url"]) ? $row["image_url"] : (!empty($row["video_url"]) ? $row["video_url"] : (!empty($row["embed_code"]) ? $row["embed_code"] : ''));
        $text = $row["text"];
        $announcementPaths[] = ["url" => $url, "text" => $text];
    }
} else {
    echo "No Announcements";
}
?>

<div id="about" class="py-lg-5">
    <div class="container-fluid py-3">
        <div class="container text-center">
            <h4 class="fs-3">ANNOUNCEMENTS</h4>
            <div class="d-flex justify-content-center mb-5" data-aos="zoom-in" data-aos-duration="1000">
                <div id="announcements_carousel" class="carousel slide w-90" data-bs-ride="carousel">
                    <div class="carousel-inner rounded-4 border shadow-lg bg-body-tertiary">
                        <?php
                        foreach ($announcementPaths as $index => $data) {
                            $isActive = ($index == 0) ? 'active' : '';
                            $url = $data["url"];
                            $text = $data["text"];
                            $fileExtension = pathinfo($url, PATHINFO_EXTENSION);
                        
                            if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])) {
                                echo '<div class="carousel-item ' . $isActive . '"><img src="../../admin/render/uploads/images/' . $url  . '" class="d-block w-100" alt="..."><div class="announcement-overlay"><div class="overlay-text fw-semibold">' . $text . '</div></div></div>';
                            } elseif (in_array($fileExtension, ['mp4', 'webm', 'ogg'])) {
                                echo '<div class="carousel-item ' . $isActive . '"><video control autoplay loop class="d-block w-100"><source src="../../admin/render/uploads/videos/' . $url  . '" type="video/' . $fileExtension . '">Your browser does not support the video tag.</video><div class="announcement-overlay"><div class="overlay-text fw-semibold">' . $text . '</div></div></div>';
                            }
                        }
                        ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#announcements_carousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#announcements_carousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <h4 class="fs-4">UNIVERSITY VISION AND MISSION STATEMENTS</h4>
            <div class="accordion" id="accordionPanelsStayOpenExample">

                <div data-aos="fade-in" class="accordion-item border border-0 mb-1">
                    <h2 class="accordion-header">
                        <button class="accordion-button bg-surface shadow-none d-block text-center pb-0 text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#vision-collapse">
                            <h4>VISION</h4>
                        </button>
                    </h2>
                    <div id="vision-collapse" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            <em>The premier university in historic Cavite globally recognized for excellence in character development, academics, research, innovation and sustainable community engagement.</em>
                        </div>
                    </div>
                </div>

                <div data-aos="fade-in" class="accordion-item border border-0 mb-1">
                    <h2 class="accordion-header">
                        <button class="accordion-button bg-surface shadow-none d-block text-center pb-0 text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#mission-collapse">
                            <h4>MISSION</h4>
                        </button>
                    </h2>
                    <div id="mission-collapse" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            <em>Cavite State University shall provide excellent, equitable and relevant educational opportunities in the arts, sciences and technology through quality instruction and responsive research and development activities. It shall produce professional, skilled and morally upright individuals for global competitiveness.</em>
                        </div>
                    </div>
                </div>

                <div data-aos="fade-in" class="accordion-item border border-0 mb-1">
                    <h2 class="accordion-header">
                        <button class="accordion-button bg-surface shadow-none d-block text-center pb-0 text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#policy-collapse">
                            <h4>QUALITY POLICY</h4>
                        </button>
                    </h2>
                    <div id="policy-collapse" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            <p><em>We <strong>C</strong>ommit to the highest standards of education, <strong>V</strong>alue our stakeholders, <strong>S</strong>trive for continual improvement of our products and services, and <strong>U</strong>phold the University’s tenets of Truth, Excellence, and Service to produce globally competitive and morally upright individuals.</em></p>
                        </div>
                    </div>
                </div>
            </div>

            <div data-aos="fade-in" class="library-objecttives mb-5">
                <h3>LIBRARY OBJECTIVES</h3>
                <ul class="text-start mt-4">
                    <li>To support the school’s graduate and undergraduate programs in its instructional, research and information needs</li>
                    <li>To provide resources, facilities, and services to the Southern Luzon State University academic community as a means to achieve the school’s goals and objective</li>
                    <li>To develop, enrich, and maintain the library collection in terms of the course offered and special programs of the College</li>
                    <li>To extend services to non-SLSU students within the limits of its resources</li>
                </ul>
            </div>


            <div data-aos="fade-in" class="library-rules mb-5">
                <h3>LIBRARY RULES AND REGULATIONS</h3>
                <ul class="text-start mt-4">
                    <li>To support the school’s graduate and undergraduate programs in its instructional, research and information needs</li>
                    <li>To provide resources, facilities, and services to the Southern Luzon State University academic community as a means to achieve the school’s goals and objective</li>
                    <li>To develop, enrich, and maintain the library collection in terms of the course offered and special programs of the College</li>
                    <li>To extend services to non-SLSU students within the limits of its resources</li>
                </ul>
            </div>


            <div data-aos="fade-in" class="library-borrowingPrevileges mb-5">
                <h3>BORROWING PRIVILEGES</h3>
                <ol class="text-start">
                    <li class="fst-italic mt-3">Reading Room Use only.</li>
                    <ul>
                        <li>Two (2) non reserved books can be borrowed at a time by library user.</li>
                        <li>Posters, maps and globes may be borrowed for classroom use and should be returned on the same day.</li>
                        <li>Reference books such as encyclopedias, yearbooks, dictionaries, newly acquired books, reserved books, thesis, special project, dissertation, periodicals, newspapers, audio-visual materials and vertical file clippings are for <strong>LIBRARY USE ONLY</strong>.</li>
                    </ul>
                    <li class="fst-italic mt-3">Overnight and Home Reading Loans.</li>
                    <ul>
                        <li>Overnight and Home Reading loans of two (2) non-reserved books are issued from 3:00 – 4:30pm.</li>
                        <li>It should be returned on or before 9:00am the next school day.</li>
                        <li>Overnight and home reading loans will start on the second week of the semester.</li>
                    </ul>
                    <li class="fst-italic mt-3">Students can borrow a maximum of two (2) books at a time.</li>
                    <li class="fst-italic mt-3">Alumni are allowed to borrow books for library use only.</li>
                    <li class="fst-italic mt-3">Maximum number of books that can be borrowed by the faculty and employee are as follows:</li>
                    <ul>
                        <li>Permanent Faculty or College Officials – three (3) titles for two (2) weeks.</li>
                        <li>Permanent Administrative Staff – two (2) titles for one (1) week.</li>
                        <li>Part-time Faculty – three (3) titles for two (2) weeks (with Deans certification).</li>
                    </ul>
                </ol>
            </div>


            <div data-aos="fade-in" class="library-fines mb-5">
                <h4>Overdue Fines</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>CLIENT</th>
                            <th>BOOK TYPE</th>
                            <th>FINES</th>
                        </tr>
                    </thead>
                    <tbody class="text-start fs-7 fs-md-6">
                        <tr>
                            <td>
                                Student
                            </td>
                            <td>
                                <div class="border-bottom">General Circulation</div>
                                <div>Reserve</div>
                            </td>
                            <td>
                                <div class="border-bottom">Php 5.00 / day*</div>
                                <div>Php 50.00 / day*</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Faculty
                            </td>
                            <td>
                                <div class="border-bottom">General Circulation</div>
                                <div>Reserve</div>
                            </td>
                            <td>
                                <div class="border-bottom">Php 10.00 / day*</div>
                                <div>Php 50.00 / day*</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <div data-aos="fade-in" class="library-guides mb-5">
                <h4>Guide to CvSU Library</h4>
                <h5 class="mt-3">Orientation</h5>
                <p>The Library Personnel shall orient students and faculty members at the start of each school year on the collections, rules and regulations and the services that the unit offers.</p>
                <br>
                <h5>Current Awareness</h5>
                <p>Bulletin boards are available for announcements, list of newly acquired books, delinquent borrowers and websites.</p>
                <br>
                <h5>Library Users</h5>
                <ul class="text-start">
                    <li><strong>Regular Users</strong> – all bonafide students, staff and faculty members of CvSU Main Campus.</li>
                    <li><strong>Extended Users</strong> – all bonafide students, staff and faculty members of CvSU Campuses as well as alumni; I.D. is required (library resources for Room Use Only).</li>
                    <li><strong>Visitors</strong> – users, not from the CvSU System, who have referral letters from librarians or heads of offices where they are enrolled/employed.</li>
                </ul>
            </div>
        </div>
    </div>
</div>