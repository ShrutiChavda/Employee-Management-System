<?php require_once('session.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Leaves</title>
    <link href="img/favicon.png" rel="icon">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <script src="js/jquery-3.6.4.min.js"></script>
    <script src="js/search.js"></script>
</head>

<body id="page-top">

    <?php require_once('sidebar.php'); ?>


    <?php require_once('topbar.php'); ?>

    <div class="container-fluid"><br>
        <a href="request_leave.php"><button class="btn btn-success">+ Apply for leave</button><br><br></a>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Leaves</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Emp ID</th>
                                <th>Employee Name</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Total Days</th>
                                <th>Reason</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $id=$_SESSION['user_id'];
                            $q = "SELECT * FROM leaves WHERE emp_id=$id";
                            $result = mysqli_query($con, $q);
                            $count = mysqli_num_rows($result);
                            while ($a = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
                                <td><?php echo $a[1]; ?></td>
                                <td><?php echo $a[2]; ?></td>
                                <td><?php echo $a[4]; ?></td>
                                <td><?php echo $a[5]; ?></td>
                                <td><?php echo $a[6]; ?></td>
                                <td><?php echo $a['reason']; ?></td>
                                <td><?php echo $a['status']; ?></td>
                                <?php } ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>



    </div>


    <?php
    require_once('footer.php');
    ?>

    </div>


    </div>



    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-success"
                        href="http://localhost/Employee%20Management%20System/user_panel/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>



    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>


    <script src="js/sb-admin-2.min.js"></script>


    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>


    <script src="js/demo/datatables-demo.js"></script>
    <script>
    window.history.pushState(null, "", window.location.href);
    window.onpopstate = function() {
        window.history.pushState(null, "", window.location.href);
    };
    </script>


</body>

</html>