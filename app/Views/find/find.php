<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/style.css">
    <style>
        body{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        header{
            width: 100%;
            display: flex;
            justify-content: flex-start;
        }
        .btn{
            margin-top: 150px;
            padding: 35px 75px;
            font-size: 26px;
            background-color: darkseagreen;
            color: #072829;
            border: none;
            border-radius: 20px;
            transition-duration: 0.3s;
        }
        .back-btn{
            align-self: flex-start;
            text-decoration: none;
            color: #000;
            font-size: 20px;
            background-color: darkseagreen;
            height: 35px;
            width: 250px;
            text-align: center;
            border-radius: 10px;
        }
        form{
            display: flex;
            flex-direction: column;
        }
        form label{
            margin-top: 20px;
            font-size: 25px;
        }
        form input, select{
            width: 150px;
            height: 30px;
        }
    </style>
</head>
<body>
    <header>
        <a href="/users" class="back-btn">Вернуться к таблице</a>
    </header>
    <section>
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
    </section>
</body>
</html>