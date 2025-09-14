<?php  include('session.php');  ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>View Employees</title>

    <!-- Custom fonts for this template-->
    <link href="img/favicon.png" rel="icon">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <script src="js/jquery-3.6.4.min.js"></script>
    <script src="js/search.js"></script>
</head>

<body id="page-top">
    <?php  include('sidebar.php'); ?>

    <?php  include('header.php'); ?>

    <!-- /.container-fluid -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Employees</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Emp. ID</th>
                                <th>NID</th>
                                <th>Picture</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Department</th>
                                <th>Salary</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                
                $q = "SELECT e.*, s.base_salary, s.bonus, s.total_salary 
                  FROM employees e 
                  LEFT JOIN salary s ON e.id = s.emp_id";              $res = mysqli_query($con, $q);
              while ($row = mysqli_fetch_array($res)) { ?>
                                <td><?php echo $row[0];  ?></td>
                                <td><?php echo $row[2];  ?></td>

                                <td>
                                    <img src="../Uploads/<?php echo $row['profile_pic']; ?>" height="60" width="60"
                                        style="object-fit:cover; border-radius:50%;">
                                </td>

                                <td><?php echo $row[4];  ?></td>
                                <td><?php echo $row[6];  ?></td>
                                <td><?php echo $row[10];  ?></td>
                                <td><?php echo $row[12];  ?></td>
                                <td><?php echo $row['total_salary'];  ?></td>

                                <td>
                                    <a href="edit_emp.php?edit=<?php echo $row[0]; ?>"
                                        class="btn btn-success btn-circle btn-sm">
                                        <i class="fas fa-check"></i>
                                    </a>
                                </td>
                                </td>
                                <?php 
                               if (isset($_GET['del']) && isset($_GET['full_name']) && isset($_GET['user_name'])) {
    $emp_id = $_GET['del'];
    $emp_name = $_GET['full_name'];
    $user_name = $_GET['user_name'];

    // Delete from event_pt where employee_name matches full_name
    mysqli_query($con, "DELETE FROM event_pt WHERE employee_name='$emp_name'");

    // Delete from leaves, projects, tours, salary
    mysqli_query($con, "DELETE FROM leaves WHERE emp_id='$emp_id'");
    mysqli_query($con, "DELETE FROM projects WHERE leader_id='$emp_id'");
    mysqli_query($con, "DELETE FROM tours WHERE emp_id='$emp_id'");
    mysqli_query($con, "DELETE FROM salary WHERE emp_id='$emp_id'");

    // Delete from emp_login where user_name matches
    mysqli_query($con, "DELETE FROM emp_login WHERE user_name='$user_name'");

    // Delete employee
    mysqli_query($con, "DELETE FROM employees WHERE id='$emp_id'");

    echo "<script>alert('Employee Deleted!');</script>";
    echo "<script>window.location.href='view_emp.php';</script>";
}

?>
                               <td>
                                <a href="view_emp.php?del=<?php echo $row['id']; ?>&full_name=<?php echo urlencode($row['full_name']); ?>&user_name=<?php echo urlencode($row['user_name']); ?>" 
                                   class="btn btn-danger btn-circle btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>
                                </td>

                            </tr>
                            <?php  }  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    </div>


    <?php
          include_once('footer.php');
          ?>

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
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
                        href="http://localhost/Employee%20Management%20System/admin_panel/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>


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

</body>

</html>