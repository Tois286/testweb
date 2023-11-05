<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran</title>
</head>

<body>
    <div>
        <label>Pendaftaran</label><br><br>
        <form action="../script/proses.php" method="post">
            <tr>
                <td>Pendidikan</td>
                <td>:<input name="pendidikan" type="pendidikan" id="pendidikan" required></input></td><br><br>

                <td>pengalaman</td>
                <td>:<input name="pengalaman" type="pengalaman" id="pengalaman" required></input></td><br><br>

                <td>Skil</td>
                <td>:<input name="skil" type="skil" id="skil" required></input></td><br><br>

                <input type="submit" value="send">
            </tr>
        </form>
    </div>
</body>

</html>