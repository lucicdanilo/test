<?php
include 'db.php';

foreach($db->query('SELECT * from Comments') as $row){
    echo "
        <div>" . $row['name'] . "</div>
        <div>" . $row['email'] . "</div>
        <div>" . $row['text'] . "</div>
    ";
}
?>