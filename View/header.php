<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="styles.css">

    <script src="section.js"></script>
    <?php
    require_once "../Config/connDB.php";
    require_once "../Controller/showTables.php";
    require_once "../Controller/dashboardStats.php";

    if (isset($_GET['msg'])) {
        if ($_GET['msg'] == 'added') {
            echo '<script> alert("Entry successfully added!"); </script>';
        } elseif ($_GET['msg'] == 'updated') {
            echo '<script> alert("Entry successfully updated!"); </script>';
        } elseif ($_GET['msg'] == 'deleted') {
            echo '<script> alert("Entry successfully deleted!"); </script>';
        } elseif ($_GET['msg'] == 'error') {
            echo '<script> alert("An unknown error has occurred!"); </script>';
        }
    }

    $conn = $connDB->getConn();
    ?>

</head>