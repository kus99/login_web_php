<?php
function register_user($nama, $nama_lengkap, $email, $alamat, $gender, $tgl_lahir, $no_hp, $pass, $level){
  global $link;

  //mencegah sql injection
  $nama          = escape($nama);
  $nama_lengkap  = escape($nama_lengkap);
  $email         = escape($email);
  $alamat        = escape($alamat);
  $gender        = escape($gender);
  $tgl_lahir     = escape($tgl_lahir);
  $no_hp         = escape($no_hp);
  $pass          = escape($pass);
  $level         = escape($level);

  // $pass  = password_hash($pass, PASSWORD_DEFAULT);
  $query = "INSERT INTO user (username, nama_lengkap, email, alamat, gender, tgl_lahir, no_hp, password, level) VALUES ('$nama','$nama_lengkap','$email','$alamat','$gender','$tgl_lahir','$no_hp','$pass','$level')";

  if( mysqli_query($link, $query) ){
    return true;
  }else{
    return false;
  }
}
function register_users($nama, $nama_lengkap, $email, $pass){
  global $link;

  //mencegah sql injection
  $nama          = escape($nama);
  $nama_lengkap  = escape($nama_lengkap);
  $email         = escape($email);
  $pass          = escape($pass);

  // $pass  = password_hash($pass, PASSWORD_DEFAULT);
  $query = "INSERT INTO user (username, nama_lengkap, email, password) VALUES ('$nama','$nama_lengkap','$email','$pass')";

  if( mysqli_query($link, $query) ){
    return true;
  }else{
    return false;
  }
}

function cek_nama($nama){
    global $link;
    $nama = escape($nama);

    $query = "SELECT * FROM user WHERE username = '$nama'";

    if( $result = mysqli_query($link, $query) ) return mysqli_num_rows($result);
}




function cek_data($nama, $pass){
  global $link;

    //mencegah sql injection
    $nama = escape($nama);
    $pass = escape($pass);

    $query  = "SELECT * FROM user WHERE username = '$nama' AND password = '$pass'";
    $result = mysqli_query($link, $query);
    $hasil  = mysqli_num_rows($result);
    if($hasil > 0){
      $r = mysqli_fetch_assoc($result);
      $_SESSION['id_user']           = $r['id'];
      // $_SESSION['nama_lengkap_user'] = $r['nama_lengkap'];
      // $_SESSION['email_user']        = $r['email'];
      // $_SESSION['alamat_user']       = $r['alamat'];
      // $_SESSION['gender_user']       = $r['gender'];
      // $_SESSION['tgl_lahir_user']    = $r['tgl_lahir'];
      // $_SESSION['no_hp_user']        = $r['no_hp'];
      // $_SESSION['password_user']     = $r['password'];
        return true;
      // }
    }else {
      return false;
    }
}

// function redirect_reg($nama){
//   global $link;
//
//     //mencegah sql injection
//     $nama = escape($nama);
//
//     $query  = "SELECT id FROM user WHERE username = '$nama'";
//     $result = mysqli_query($link, $query);
//     $hasil  = mysqli_num_rows($result);
//     if($hasil > 0){
//       $r = mysqli_fetch_assoc($result);
//       $_SESSION['id_user']           = $r['id'];
//       // $_SESSION['nama_lengkap_user'] = $r['nama_lengkap'];
//       // $_SESSION['email_user']        = $r['email'];
//       // $_SESSION['alamat_user']       = $r['alamat'];
//       // $_SESSION['gender_user']       = $r['gender'];
//       // $_SESSION['tgl_lahir_user']    = $r['tgl_lahir'];
//       // $_SESSION['no_hp_user']        = $r['no_hp'];
//       // $_SESSION['password_user']     = $r['password'];
//         header('Location: index.php');
//       // }
//     }else {
//       header('Location: login.php');
//     }
// }


// function cek_data($nama, $pass){
//   global $link;
//
//     //mencegah sql injection
//     $nama = escape($nama);
//     $pass = escape($pass);
//
//     $query  = "SELECT * FROM user WHERE username = '$nama' AND password = '$pass'";
//     $result = mysqli_query($link, $query);
//     $hasil  = mysqli_num_rows($result);
//     if($hasil > 0){
//       // while (mysqli_fetch_assoc($result)) {
//         return true;
//       // }
//     }else {
//       return false;
//     }
// }
//mencegah injection
function escape($data){
  global $link;
  return mysqli_real_escape_string($link, $data);
}
//
// function redirect_login($id, $nama, $nama_lengkap, $email, $alamat, $gender, $tgl_lahir, $no_hp, $password){
//     $_SESSION['id']           = $id;
//     $_SESSION['user']         = $nama;
//     $_SESSION['nama_lengkap'] = $nama_lengkap;
//     $_SESSION['email']        = $email;
//     $_SESSION['alamat']       = $alamat;
//     $_SESSION['gender']       = $gender;
//     $_SESSION['tgl_lahir']    = $tgl_lahir;
//     $_SESSION['no_hp']        = $no_hp;
//     $_SESSION['password']     = $password;
//     header('Location: index.php');
// }
function redirect_login($nama){
    $_SESSION['user'] = $nama;
    header('Location: index.php');
}
function flash_delete($name){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

//menguji status user apakah admin atau bukan
function cek_status($nama){
  global $link;
  $nama = escape($nama);

  $query = "SELECT level FROM user WHERE username='$nama'";

  $result = mysqli_query($link, $query);
  $status = mysqli_fetch_assoc($result)['level'];

  if( $status == 1) return true;
  else return false;
}
function profile($id){
  $query  = "SELECT id FROM user WHERE username = '$nama'";
  return run($query);
}
function hapus_data($id){
  $query  = "DELETE FROM artikel WHERE id=$id";
  return run($query);
}

function run($query){
  global $link;
  if (mysqli_query($link, $query)) return true;
  else return false;
}
?>
