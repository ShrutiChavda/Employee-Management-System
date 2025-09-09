<<<<<<< HEAD
<?php  require_once('session.php');
=======
<?php  include('session.php');
>>>>>>> ba9599d800c76f6076b2fa687cf5e6f7d060b310
  if(isset($_GET['del'])) {
    $event_id = $_GET['del'];
    // Delete event from the database
    $delete_query = "DELETE FROM events WHERE id='$event_id'";
    if(mysqli_query($con, $delete_query)) {
        echo "<script>alert('Event deleted successfully!');</script>";
        // Redirect to the same page or any other desired page after deletion
        echo "<script>window.location.href='http://localhost/Employee%20Management%20System/admin_panel/event.php';</script>";
        exit();
    } else {
        // Handle deletion error
        echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
        // Redirect to the same page or any other desired page after deletion
        echo "<script>window.location.href='http://localhost/Employee%20Management%20System/admin_panel/event.php';</script>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Events</title>
    <link href="img/favicon.png" rel="icon">

<<<<<<< HEAD

=======
    <!-- Custom fonts for this template-->
>>>>>>> ba9599d800c76f6076b2fa687cf5e6f7d060b310
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <script src="js/jquery-3.6.4.min.js"></script>
    <script src="js/search.js"></script>

</head>

<body id="page-top">

<<<<<<< HEAD
    <?php  require_once('sidebar.php'); ?>

    <?php  require_once('topbar.php'); ?>


    <div class="container-fluid">


=======
    <?php  include('sidebar.php'); ?>

    <?php  include('topbar.php'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
>>>>>>> ba9599d800c76f6076b2fa687cf5e6f7d060b310
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Events</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Event ID</th>
                                <th>Event Name</th>
                                <th>Description</th>
                                <th>Event Date</th>
                                <th>Event Starting time</th>
                                <th>Event Ending Time</th>
                                <th>Address</th>
                                <th>Apply</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        
                            $q = "SELECT * FROM events";
                            $resss = mysqli_query($con, $q);
                            while ($row = mysqli_fetch_array($resss)) {
                            ?>

                            <tr>
                                <td><?php echo $row[0]; ?></td>
                                <td><?php echo $row[1]; ?></td>
                                <td><?php echo $row[2]; ?></td>
                                <td><?php echo $row[3]; ?></td>
                                <td><?php echo $row[4]; ?></td>
                                <td><?php echo $row[5]; ?></td>
                                <td><?php echo $row[6]; ?></td>
                                <td>
<<<<<<< HEAD

                                    <a href="apply_for_event.php?apply=<?php echo $row[0];?>"
                                        class="btn btn-success btn-circle btn-sm">
=======
                                  
                                    <a href="apply_for_event.php?apply=<?php echo $row[0];?>" class="btn btn-success btn-circle btn-sm">
>>>>>>> ba9599d800c76f6076b2fa687cf5e6f7d060b310
                                        <i class="fas fa-check"></i>
                                    </a>
                                </td>
                                <td>
<<<<<<< HEAD
                                    <a href="event_details.php?id=<?php 
=======
    <a href="event_details.php?id=<?php 
>>>>>>> ba9599d800c76f6076b2fa687cf5e6f7d060b310
        $id = $row[0]; // Assuming $row[0] contains the event ID
        $q = "SELECT * FROM event_pt WHERE id = $id";
        $ress = mysqli_query($con, $q);
        if($ress && mysqli_num_rows($ress) > 0) {
            $row = mysqli_fetch_assoc($ress); // Fetch the event data
            $a = $row['admin_remark'];
            if($a == "Applied" || $a="Approved") {
                echo $row['id']; // Output the event ID
            } 
        } else {
            echo "";
        }  
      
    ?>" class="btn btn-warning btn-circle btn-sm">
<<<<<<< HEAD
                                        <i class="fas fa-info"></i>
                                    </a>
                                </td>



=======
        <i class="fas fa-info"></i>
    </a>
</td>

                               
                          
>>>>>>> ba9599d800c76f6076b2fa687cf5e6f7d060b310
                            </tr>
                            <?php } ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
<<<<<<< HEAD


    </div>


    <?php
          require_once('footer.php');
          ?>

    </div>


    </div>



=======
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <?php
          include_once('footer.php');
          ?>

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
>>>>>>> ba9599d800c76f6076b2fa687cf5e6f7d060b310
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

<<<<<<< HEAD

=======
    <!-- Logout Modal-->
>>>>>>> ba9599d800c76f6076b2fa687cf5e6f7d060b310
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


<<<<<<< HEAD

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
=======
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
>>>>>>> ba9599d800c76f6076b2fa687cf5e6f7d060b310

</body>

</html>