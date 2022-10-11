<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lab 2 Task 1</title>
  </head>
  <body>
    <h1>PHP Form Validation</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" />
      <input type="submit" value="submit" />
    </form>
  </body>
</html>
