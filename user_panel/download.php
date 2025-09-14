<?php
require_once('connection.php');

if (isset($_GET['project_id'])) {
    $project_id = $_GET['project_id'];

    $query = "SELECT file_name FROM projects WHERE p_id = '$project_id'";
    $result = mysqli_query($con, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $file_name = $row['file_name'];

        if (!empty($file_name)) {
            // Use absolute path
            $file_path = __DIR__ . "/Uploads/" . $file_name;

            if (file_exists($file_path) && is_readable($file_path)) {
                // Set headers before output
                header("Content-Type: application/octet-stream");
                header("Content-Disposition: attachment; filename=\"" . basename($file_name) . "\"");
                header("Content-Length: " . filesize($file_path));
                header("Pragma: no-cache");
                header("Expires: 0");

                // Clear output buffer and send file
                ob_clean();
                flush();
                readfile($file_path);
                exit;
            } else {
                die("File not found or not readable: " . htmlspecialchars($file_name));
            }
        } else {
            die("No file assigned to this project.");
        }
    } else {
        die("Invalid project ID.");
    }
} else {
    die("Invalid request.");
}
?>
