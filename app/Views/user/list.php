<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    table, tr, td, th{
      border: 1px solid black;
    }
    table{
      width: 100%;
      border-collapse: collapse;
    }
    th{
      height: 50px;
    }
    td{
      text-align: center;
    }
    
  </style>
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Status</th>
        </tr>
    <?php foreach($users as $key=>$value): ?>
        <tr>
          <td><?=$value->id;?></td>
          <td><?=$value->name;?></td>
          <td><?=$value->email;?></td>
          <td><?=$value->gender;?></td>
          <td><?=$value->status;?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>