<?php

    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        move_uploaded_file($_FILES['file']['tmp_name'], '../../assets/img/items/' . $_FILES['file']['name']);
        echo '../assets/img/items/' . $_FILES['file']['name'];
    }

?>