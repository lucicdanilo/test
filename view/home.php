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
    <a href="./index.php?act=login" class="mx-3" style="float: right;">Admin Page</a>
    <h1 class="m-3 p-3">Wellcome to our store!</h1>
    <div class="container productsContainer mt-3">
        <?php include 'Products.php';?>
    </div>
    <div class="container">
        <h3 class="m-3">Comments:</h3>
        <?php 
        foreach($comments as $row){
            echo "
            <div class='comments p-3 '>
                <div>" . $row['name'] . "<span class='commentMail'>" . $row['email'] . "</span></div>
                <div class='commentText'>" . $row['TEXT'] . "</div>
            </div>
            ";
        }

        ?>
    </div>

    <div class="container px-5 m-5" style="width: 50%">
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


