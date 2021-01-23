<?php
include 'db.php';

foreach($dbh->query('SELECT * from Products') as $row) {
echo "
    <div class='card' style='width: 18rem;'>
        <img src='...' class='card-img-top' alt=''>
        <div class='card-body'>
            <h5 class='card-title'>". $row["title"]. "</h5> 
            <p class='card-text'>". $row["description"] . "</p>
            <a href='' class='btn btn-primary'>". $row["title"]. "</a>
        </div>
    </div>";
}

?>