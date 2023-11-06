<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran</title>
    <style>
        /* Reset some default browser styles */
html, body {
    margin: 0;
    padding: 0;
}

/* Style the entire body content */
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    padding: 20px;
}

/* Center the form on the page */
div {
    max-width: 400px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Style form labels and select elements */
label {
    font-weight: bold;
}

select {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Style the submit button */
input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

    </style>
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