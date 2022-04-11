<?php
if ($database->conn->query($query) === TRUE) {
    echo "Thêm được dữ liệu";
  } else {
    echo "Error: " . $query . "<br>" . $database->conn->error;
  }
?>