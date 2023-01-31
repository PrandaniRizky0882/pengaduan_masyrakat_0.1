<div class="card" style="padding: 50px; width: 40%; margin: 0; margin-top: 10%;">
<h3 style="text-align: center;" class="orange-text">LOGIN!</h3>
<br><center><p>Repost by <a href='https://stokcoding.com/' title='RPLrecord.com' target='_blank'>FlameChaser</a></p></center>


<form method="POST">
    <div class="input_field">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>
    </div>
    <div class="input_field">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
    </div>

    <input type="submit" value="Login" name="login" class="btn btn-primary" style="width: 50%;">
</form>
</div>

<?php 

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi,$_POST['username']);
    $password = mysqli_real_escape_string($koneksi,md5($_POST['password']));

    $sql = mysqli_query($koneksi,"SELECT * FROM masyarakat WHERE username='$username' AND password='$password' ");
    $cek = mysqli_num_rows($sql);
    $data = mysqli_fetch_assoc($sql);



    $sql2 = mysqli_query($koneksi,"SELECT * FROM petugas WHERE username='$username' AND password='$password' ");
    $cek2 = mysqli_num_rows($sql2);
    $data2 = mysqli_fetch_assoc($sql2);

    if ($cek>0) {
        session_start();
        $_SESSION['username']= $username;
        $_SESSION['data']= $data;
        $_SESSION['level']= 'masyarakat';
        header('location:masyarakat/');
    }
    elseif ($cek2>0) {
        if ($data2['level'] == "admin") {
            session_start();
            $_SESSION['username']=$username;
            $_SESSION['data']=$data2;
            header('location:admin/');
        }

        elseif ($data2['level']=="petugas") {
            session_start();
            $_SESSION['username']=$username;
            $_SESSION['data']=$data2;
            header('location:petugas/');
        }
    }
    else {
        echo "<script>alert('GAgal Login!')</script>";
    }
}
?>