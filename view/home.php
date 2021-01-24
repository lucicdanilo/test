<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./styles/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Store</title>
  </head>
  <body>
    <h1>Wellcome to our store!</h1>
    <a href="./index.php?act=login">Admin Page</a>

    <div class="container productsContainer">
        <?php include 'Products.php';?>
    </div>
    <div class="container">
        <?php 
        foreach($comments as $row){
            echo "
            <div class='comments'>
                <div>" . $row['name'] . "</div>
                <div>" . $row['email'] . "</div>
                <div>" . $row['TEXT'] . "</div>
            </div>
            ";
        }

        ?>
    </div>

    <div class="container">
        <form action="../test/index.php?act=postComment" method="post" name="postComment">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="John">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="john@example.com">
            </div>
            <div class="mb-3">
                <label for="comment" class="form-label">Comment:</label>
                <textarea class="form-control" id="comment" name="text" rows="3"></textarea>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Add comment</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  </body>
</html>


