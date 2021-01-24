<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Store</title>
  </head>
  <body>
    <h1>Wellcome to your dashboard!</h1>

    <div class="container">
        <form action="../test/index.php?act=approveCommets" method="post">
            <?php 
            foreach($unapprovedComments as $row){
              echo "
              <div class='approveComments'>
                  <div>" . $row['name'] . "</div>
                  <div>" . $row['email'] . "</div>
                  <div>" . $row['TEXT'] . "</div>
                  <div>Approve
                      <input class='form-check-input' type='checkbox' name='".$row['id']."'>
                  </div>
              </div>
              ";
              array_push($allCommentsId, $row['id']);
            }?>
            <button type="submit" name="submit" class="btn btn-primary">Approve</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  </body>
</html>