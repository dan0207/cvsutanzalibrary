<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Circulation</title>

        <link rel="stylesheet" href="../style.css">

        <!-- Bootstrap style -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <!-- Bootstrap script -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- font awesome -->
        <script src="https://kit.fontawesome.com/9475ab4ee0.js" crossorigin="anonymous"></script>
    </head>
    
    <body>
        <?php include '../adminNavigation/header.php'; ?>
        <div class="pt-5">
            <?php include '../adminNavigation/sidebar.php'; ?>
        </div>
        <div id="admin-body">
            <section id="list">
                <h1 id="pageHeader">List</h1>
            </section>
            
            <section id="view">
                <h1 id="pageHeader">View</h1>
            </section>
            
            <section id="profile">
                <h1 id="pageHeader">Profile</h1>
            </section>
            
        </div>

        <script src="../script.js"></script>
    </body>
</html>