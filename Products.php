<?php
include 'db.php';

foreach($db->query('SELECT * from Products') as $row) {
echo "
    <div class='card m-4' style='width: 18rem;'>
        <img src='".$row["image"]."' class='card-img-top' alt=''>
        <div class='card-body'>
            <h5 class='card-title'>". $row["title"]. "</h5> 
            <p class='card-text'>". $row["description"] . "</p>
            <a href='' class='btn btn-primary'>Buy</a>
        </div>
    </div>";
}

?>