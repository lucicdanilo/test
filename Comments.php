<?php
include 'db.php';

foreach($db->query('SELECT * from Comments WHERE approved = 1') as $row){
    echo "
        <div>" . $row['name'] . "</div>
        <div>" . $row['email'] . "</div>
        <div>" . $row['text'] . "</div>
    ";
}
?>