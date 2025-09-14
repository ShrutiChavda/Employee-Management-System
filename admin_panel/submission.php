<?php
if (isset($_GET['file'])) {
    $file = basename($_GET['file']); 
    $filePath = __DIR__ . "/../user_panel/Uploads/" . $file;
    if (file_exists($filePath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));
        flush();
        readfile($filePath);
        exit;
    } else {
        echo "<script>alert('File not found: $filePath'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Invalid request'); window.history.back();</script>";
}
?>
