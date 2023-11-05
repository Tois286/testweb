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
                <select name="pendidikan" id="pendidikan">
                    <option value="50">smk/sma/tkj</option>
                    <option value="60">d1</option>
                    <option value="65">d2</option>
                    <option value="70">d3</option>
                    <option value="75">s1</option>
                    <option value="85">s2</option>
                    <option value="90">s3</option>
                </select><br><br>

                <td>pengalaman</td>
                <select name="pengalaman" id="pengalaman">
                    <option value="50">6bulan</option>
                    <option value="60">1 s/d 2thn</option>
                    <option value="70">3 s/d 4thn</option>
                    <option value="80">lebih</option>
                </select><br><br>
                
                <td>Skil</td>
                <select name="skil" id="skil">
                    <option value="80">backend</option>
                    <option value="70">frontend</option>
                    <option value="50">QA</option>
                    <option value="90">fullstack</option>
                </select><br><br>

                <input type="submit" value="send">
            </tr>
        </form>
    </div>
</body>

</html>