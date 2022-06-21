<?php
// Alert function

// Get alert message from GET request
if (isset($_GET['msg_type'])) {
    $msg_type = $_GET['msg_type'];
    $msg_detail = $_GET['msg_detail'];
}

if (isset($msg_type)) {
    echo '<div class="alert alert-' . $msg_type . ' alert-dismissible fade show" role="alert">
          ' . $msg_detail . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
