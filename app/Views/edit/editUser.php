<?php
    $genders = ["male" => "Male", "female" => "Female"];
    $statuses = ["active" => "Active", "inactive" => "Inactive"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    
    <form action="/users/:userID" method="put">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required value="<?=$user->email;?>">

        <label for="name">Your first and last name:</label>
        <input type="text" id="name" name="name" required value="<?=$user->name;?>">

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <?php foreach($genders as $value => $label):?>
            <option value="<?=$value?>" <?= $value === $user->gender ? "selected" : "";?>><?=$label?></option>
            <?php endforeach;?>
        </select>

        <label for="status">Status:</label>
        <select id="status" name="status" required">
        <?php foreach($statuses as $value => $label):?>
            <option value="<?=$value?>" <?= $value === $user->status ? "selected" : "";?>><?=$label?></option>
            <?php endforeach;?>
        </select>

        <button type="submit" class="btn">Submit</button>
    </form>
</body>
</html>

