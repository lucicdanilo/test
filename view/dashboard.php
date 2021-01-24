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
    <a href="./" class="mx-3" style="float: right;">Homepage</a>
    <h1 class="m-3 p-3">Wellcome to your dashboard!</h1>
    <div class="container">
        <form action="../test/index.php?act=approveCommets" method="post">
            <?php 
            foreach($unapprovedComments as $row){
              echo "
              <div class='approveComments m-3 p-3'>
                  <div>" . $row['name'] . "<span class='approveCommentsEmail'>" . $row['email'] . "</span></div>
                  <div class='approveCommentsText'>" . $row['TEXT'] . "</div>
                  <div class='approveCheckbox'>Approve
                      <input class='form-check-input' type='checkbox' name='".$row['id']."'>
                  </div>
              </div>
              ";
              $allCommentsId[] = $row['id'];
            }?>
            <button type="submit" name="submit" class="btn btn-primary m-3">Approve</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  </body>
</html>