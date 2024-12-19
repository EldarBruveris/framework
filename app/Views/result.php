
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .btn{
    padding: 35px 75px;
    font-size: 26px;
    background-color: darkseagreen;
    color: #072829;
    border: none;
    border-radius: 20px;
    transition-duration: 0.3s;
}
    .btn:hover{
    background-color: rgb(108, 143, 108);
    color: #bfd5d6;
    cursor: pointer;
    box-shadow: 6px 6px 5px black;
    transition-duration: 0.3s;
}
  </style>
</head>
<body>
  <!-- <ul>
    <?php foreach($_POST as $key=>$value): ?>
      <li><b><?php echo $key;?></b> <?=$value;?></li>
    <?php endforeach; ?>
  </ul> -->
  <h1>User is saved succesfully</h1>
  <a href="/users/new"><button class="btn">Вернуться назад</button></a>
</body>
</html>