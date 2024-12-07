<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <form action="/findResult" method="post">
        <label for="choice">Критерий поиска</label>
        <select id="choice" name="choice" required>
            <option value="id">id</option>
            <option value="email">email</option>
            <option value="name">name</option>
        </select>

        <label for="value">Значение:</label>
        <input type="text" id="value" name="value" required>

        <button type="submit" class="btn">Submit</button>
    </form>
</body>
</html>