<div class="flex-shrink-0 p-3 bg-white card" style="width: auto;">
    <ul class="list-unstyled ps-0">
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#recent-post" aria-expanded="true">
                Recent Post
            </button>

            <div class="collapse show" id="recent-post">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-4">
                    <ul><a href="#" class="nav-link">New Post Trial 2</a></ul>
                    <ul><a href="#" class="nav-link">Creating New post for testing</a></ul>
                </ul>
            </div>
        </li>
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#academic-subscription" aria-expanded="false">
                Academic Subscription
            </button>
            <div class="collapse" id="academic-subscription">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-4">
                    <?php
                        $select_sql = "SELECT subText, links FROM librarypages WHERE pages = 'links' AND mainText = 'academic subscription'";
                        $result = mysqli_query($conn, $select_sql);

                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $subText = $row['subText'];
                                $link = $row['links'];
                                // Output the hyperlink using the retrieved 'subText' and 'links'.
                                echo '<ul><a class="nav-link" href="' . $link . '">' . $subText . '</a></ul>';
                            }
                        } else {
                            // Handle query execution errors here.
                            echo 'Error executing the query: ' . mysqli_error($conn);
                        }
                    ?>
                </ul>
            </div>
        </li>
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#e-books" aria-expanded="false">
                E-Books
            </button>

            <div class="collapse" id="e-books">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-4">
                    <?php
                        $select_sql = "SELECT subText, links FROM librarypages WHERE pages = 'links' AND mainText = 'e-books'";
                        $result = mysqli_query($conn, $select_sql);

                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $subText = $row['subText'];
                                $link = $row['links'];
                                // Output the hyperlink using the retrieved 'subText' and 'links'.
                                echo '<ul><a class="nav-link" href="' . $link . '">' . $subText . '</a></ul>';
                            }
                        } else {
                            // Handle query execution errors here.
                            echo 'Error executing the query: ' . mysqli_error($conn);
                        }
                    ?>
                </ul>
            </div>
        </li>
        <!-- <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#e-resources" aria-expanded="false">
            E-Resources
            </button>
            <div class="collapse" id="e-resources">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-4">
                    <li><a href="Diary of Open Access Books" class="link-dark d-inline-flex text-decoration-none rounded">New
                        Diary of Open Access Books
                    </a></li>
                </ul>
            </div>
        </li> -->
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#e-journals" aria-expanded="false">
                E-journals
            </button>

            <div class="collapse" id="e-journals">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-4">
                    <?php
                        $select_sql = "SELECT subText, links FROM librarypages WHERE pages = 'links' AND mainText = 'e-journals'";
                        $result = mysqli_query($conn, $select_sql);

                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $subText = $row['subText'];
                                $link = $row['links'];
                                // Output the hyperlink using the retrieved 'subText' and 'links'.
                                echo '<ul><a class="nav-link" href="' . $link . '">' . $subText . '</a></ul>';
                            }
                        } else {
                            // Handle query execution errors here.
                            echo 'Error executing the query: ' . mysqli_error($conn);
                        }
                    ?>
                </ul>
            </div>
        </li>
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#campus-website" aria-expanded="true">
            Campus Website
            </button>

            <div class="collapse show" id="campus-website">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-4">
                    <?php
                        $select_sql = "SELECT subText, links FROM librarypages WHERE pages = 'links' AND mainText = 'cvsu tanza page'";
                        $result = mysqli_query($conn, $select_sql);

                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $subText = $row['subText'];
                                $link = $row['links'];
                                // Output the hyperlink using the retrieved 'subText' and 'links'.
                                echo '<ul><a class="nav-link" href="' . $link . '">' . $subText . '</a></ul>';
                            }
                        } else {
                            // Handle query execution errors here.
                            echo 'Error executing the query: ' . mysqli_error($conn);
                        }
                    ?>
                </ul>
            </div>
        </li>
    </ul>
  </div>
