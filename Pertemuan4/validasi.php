<html>

<head>
    <style>
        .error {
            color: #FF0000;

        }
    </style>
</head>

<body>
    <?php
    $namaErr = $emailErr = $genderErr = $websiteErr = "";
    $nama = $email = $gender = $comment = $website = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = true;

        if (empty($_POST["nama"])) {
            $namaErr = "Nama harus diisi";
            $input = false;
        } else {
            $nama = test_input($_POST["nama"]);
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email harus diisi";
            $input = false;
        } else {
            $email = test_input($_POST["email"]);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Email tidak sesuai format";
                $input = false;
            }
        }

        if (empty($_POST["website"])) {
            $website = "";
        } else {
            $website = test_input($_POST["website"]);
        }

        if (empty($_POST["comment"])) {
            $comment = "";
        } else {
            $comment = test_input($_POST["comment"]);
        }

        if (empty($_POST["gender"])) {
            $genderErr = "Gender harus dipilih";
            $input = false;
        } else {
            $gender = test_input($_POST["gender"]);
        }

        if ($input === true) {
            include_once("koneksi.php");

            $result = mysqli_query($con, "INSERT INTO komentar(id,nama,email,website,komentar,gender) VALUES('','$nama', '$email','$website','$comment','$gender')");
            echo "<script> 
            alert('Data Berhasil Ditambah');
            document.location='index.php';
            </script>";
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    <h2>Posting Komentar </h2>

    <p><span class="error">* Harus Diisi.</span></p>

    <form method="post" action="<?php
                                echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table>
            <tr>
                <td>Nama:</td>
                <td><input type="text" name="nama">
                    <span class="error">* <?php echo $namaErr; ?></span>
                </td>
            </tr>

            <tr>
                <td>E-mail: </td>
                <td><input type="text" name="email">
                    <span class="error">* <?php echo $emailErr; ?></span>
                </td>
            </tr>

            <tr>
                <td>Website:</td>
                <td> <input type="text" name="website">
                    <span class="error"><?php echo $websiteErr; ?></span>
                </td>
            </tr>

            <tr>
                <td>Komentar:</td>
                <td> <textarea name="comment" rows="5" cols="40"></textarea></td>
            </tr>

            <tr>
                <td>Gender:</td>
                <td>
                    <input type="radio" name="gender" value="Laki-Laki">Laki-Laki
                    <input type="radio" name="gender" value="Perempuan">Perempuan
                    <span class="error">* <?php echo $genderErr; ?></span>
                </td>
            </tr>

            <td>
                <input type="submit" name="submit" value="Submit">
            </td>

        </table>

    </form>
    <a href="index.php">Kembali</a>
</body>

</html>