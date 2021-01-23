<?php
include 'db.php';

foreach($db->query('SELECT * from Comments WHERE approved = 1') as $row){
    echo "
    <div class='comments'>
        <div>" . $row['name'] . "</div>
        <div>" . $row['email'] . "</div>
        <div>" . $row['TEXT'] . "</div>
    </div>
    ";
}
?>