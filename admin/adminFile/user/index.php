<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CvSu Tanza Library</title>

        <link rel="stylesheet" href="../style.css">

        <!-- Bootstrap style -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        
    </head>

    <body>
        <?php include '../userNavigation/header.php'?>
        <?php include '../render/satisfactionRating.php'?>
        <section id=tanza_bg>
            <div id="filter"></div>
            <div id="index-text"></div>
        </section>

        <div id="opac-search">
            <p>Online Public Access Catalog</p>
            <form class="d-flex" role="search">
                <input class="form-control me-2" placeholder="Title, Author, Subject, Series or Call Number" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
        <section>
            <!-- courses -->
            <div class="container-sm pt-5 pb-5">
                <table class="table table-striped table-sm table-hover border border-secondary">
                    <h1>Courses Offered/Offerings</h1>
                    <tbody class="fs-6 lh-1">
                        <tr>
                            <td>Bachelor of Elementary Education</td>
                        </tr>
                        <tr>
                            <td>Bachelor of Secondary Education</td>
                        </tr>
                        <tr>
                            <td>BS Business Management</td>
                        </tr>
                        <tr>
                            <td>BS Hospitality Management (formerly BS Hotel and Restaurant Management)</td>
                        </tr>
                        <tr>
                            <td>BS Tourism Management</td>
                        </tr>
                        <tr>
                            <td>BS Information Technology</td>
                        </tr>
                        <tr>
                            <td>BS Psychology</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>


        <?php include '../userNavigation/footer.php'; ?>

        <!-- bootstrap 5 script -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    </body>
</html>