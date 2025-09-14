<?php  
require_once('session.php'); 

$id = $_SESSION['user_id'];
$q1 = "SELECT * FROM employees WHERE id=$id";
$result = mysqli_query($con, $q1);
$employee_detail = mysqli_fetch_assoc($result);

$event_details = [];
$idd = 0;
if(isset($_GET['apply'])) {
    $idd = intval($_GET['apply']); // security: cast to int
    $query = "SELECT * FROM events WHERE id=$idd";
    $res = mysqli_query($con, $query);
    $event_details = mysqli_fetch_assoc($res);
}

if(isset($_POST['btn'])) { 
    $i1 = $_POST['id'];
    $employee_name = $_POST['emp'];
    $mobile_number = $_POST['mb'];
    $event_date = $_POST['event_date'];
    $event_starting_time = $_POST['start_time'];
    $event_ending_time = $_POST['end_time'];
    $venue_address = $_POST['venue_address'];
    $title_of_participation = $_POST['service'];
    $additional_information = $_POST['additional_info'];
    
    // Check if the logged-in employee already has a row for this event
    $check_query = "SELECT * FROM event_pt WHERE event_id='$i1' AND employee_name='$employee_name'";
    $check_result = mysqli_query($con, $check_query);

    if(mysqli_num_rows($check_result) > 0) {
        // UPDATE existing row for this employee
        $row = mysqli_fetch_assoc($check_result);
        $update_query = "UPDATE event_pt 
            SET mobile_number = '$mobile_number', 
                event_date = '$event_date', 
                event_starting_time = '$event_starting_time', 
                event_ending_time = '$event_ending_time', 
                venue_address = '$venue_address', 
                title_of_participation = '$title_of_participation', 
                additional_information = '$additional_information', 
                admin_remark = 'Applied' 
            WHERE id=".$row['id'];
        mysqli_query($con, $update_query);

        echo "<script>alert('Participation updated successfully!');</script>";
        echo "<script>window.location.href='event.php';</script>";
        exit;

    } else {
        // INSERT new row for this employee
        $insert_query = "INSERT INTO event_pt 
            (event_id, employee_name, mobile_number, event_date, event_starting_time, event_ending_time, venue_address, title_of_participation, additional_information, admin_remark) 
            VALUES 
            ('$i1','$employee_name', '$mobile_number', '$event_date', '$event_starting_time', '$event_ending_time', '$venue_address', '$title_of_participation', '$additional_information','Applied')";
        
        if(mysqli_query($con, $insert_query)) {
            echo "<script>alert('Applied successfully!');</script>";
            echo "<script>window.location.href='event.php';</script>";
            exit;
        } else {
            echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
            echo "<script>window.location.href='event.php';</script>";
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Apply for Event</title>
    <link href="img/favicon.png" rel="icon">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/apply_for_event.js"></script>
</head>

<body id="page-top">

    <?php require_once('sidebar.php'); ?>
    <?php require_once('topbar.php'); ?>

    <div class="container-fluid">
        <form id="registrationForm" action="apply_for_event.php?apply=<?php echo $idd; ?>" method="post">

            <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
                <div class="wrapper wrapper--w680">
                    <div class="card card-1">
                        <div class="card-body">
                            <h2 class="title">Apply for Event</h2>

                            <div>
                                <p>Employee Name</p>
                                <div class="input-group1">
                                    <input class="input--style-1" type="text" name="emp"
                                        value="<?php echo $employee_detail['full_name']; ?>" readonly />
                                </div>
                            </div>

                            <div>
                                <p>Mobile number</p>
                                <div class="input-group1">
                                    <input class="input--style-1" type="text" name="mb"
                                        value="<?php echo $employee_detail['contact']; ?>" readonly />
                                </div>
                            </div>

                            <input type="hidden" name="id" value="<?php echo $event_details['id']; ?>">

                            <div>
                                <p>Event Date</p>
                                <input class="input--style-1" type="date" name="event_date"
                                    value="<?php echo $event_details['date']; ?>" readonly />
                            </div>

                            <div>
                                <p>Event Starting Time</p>
                                <input class="input--style-1" type="time" name="start_time"
                                    value="<?php echo $event_details['starting_time']; ?>" readonly />
                            </div>

                            <div>
                                <p>Event Ending Time</p>
                                <input class="input--style-1" type="time" name="end_time"
                                    value="<?php echo $event_details['ending_time']; ?>" readonly />
                            </div>

                            <div>
                                <p>Venue Address</p>
                                <input class="input--style-1" type="text" name="venue_address"
                                    value="<?php echo $event_details['address']; ?>" readonly />
                            </div>

                            <div>
                                <p>Title of participation</p>
                                <?php
                                $event_pt_row = [];
                                if($idd > 0){
                                    $employee_name = $employee_detail['full_name']; // logged-in employee
                                    $event_pt_query = "SELECT * FROM event_pt WHERE event_id = $idd AND employee_name = '$employee_name' LIMIT 1";
                                    $event_pt_result = mysqli_query($con, $event_pt_query);
                                    if(mysqli_num_rows($event_pt_result) > 0){
                                        $event_pt_row = mysqli_fetch_assoc($event_pt_result);
                                    }
                                }
                                ?>
                                <input class="input--style-1" type="text" name="service"    
                                    value="<?php echo isset($event_pt_row['title_of_participation']) ? $event_pt_row['title_of_participation'] : ''; ?>" />
                            </div>

                            <div>
                                <p>Additional Information</p>
                                <?php
                                $additional_info = isset($event_pt_row['additional_information']) ? $event_pt_row['additional_information'] : '';
                                ?>
                                <input class="input--style-1" type="text" name="additional_info"
                                    value="<?php echo $additional_info; ?>" />
                            </div>

                            <div class="p-t-20">
                                <button class="btn btn--radius btn-success" type="submit" name="btn">Submit</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php require_once('footer.php'); ?>
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
