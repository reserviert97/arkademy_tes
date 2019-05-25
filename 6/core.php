<?php
session_start();

$servername = "localhost";
$username = "admin";
$password = "admin";
$dbname = "arkademy";

$conn = mysqli_connect($servername, $username, $password, $dbname);


/**
 * Bagian Tambah 
 */

if (isset($_POST['tambah_user'])) {
    global $conn;
    $nama = $_POST['nama_user'];
    $sql = "INSERT INTO users VALUES( NULL, '$nama' )";

    if (mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'ditambah';
        header("location: 6b.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        die(mysqli_error($conn));
    }
}

if (isset($_POST['tambah_skill'])) {
    global $conn;
    $nama = $_POST['nama_skill'];
    $id = $_POST['user_id'];
    $sql = "INSERT INTO skills VALUES( NULL, '$nama', $id )";

    if (mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'ditambah';
        header("location: 6b.php#baris".$id);
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        die(mysqli_error($conn));
    }
}


/**
 * Bagian Delete
 */

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    global $conn;

    if (isset($_POST['delete_user'])) {
        
        $sql = "DELETE FROM users WHERE id = $id";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['success'] = 'dihapus';
            header("location: 6b.php");
        } 

    }

    if (isset($_GET['delete_skill'])) {
        
        $sql = "DELETE FROM skills WHERE id = $id";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['success'] = 'dihapus';
            header("location: 6b.php#baris".$_GET['delete_skill']);
        } 

    }
}

 
/**
 * Bagian Read
 */


function read(){
    global $conn;

    // $sql = "SELECT
    //     users.id,
    //     users.name,
    //     skills.user_id,
    //     skills.name skill
    //     FROM
    //     users
    //     JOIN skills ON (skills.user_id = users.id)";

    // $result = mysqli_query($conn, $sql);
    // $data = [];

    // if (mysqli_num_rows($result) > 0) {

    //     while($row = mysqli_fetch_array($result)) {
    //         $data[$row["id"]]["id"]   = $row['id'];
    //         $data[$row["id"]]["name"] = $row["name"];
    //         if (empty($row["user_id"] || empty($row['skill']))) {
    //             $data[$row["id"]]["skills"][$row["id"]][] = '';
    //         }else {
    //             $data[$row["id"]]["skills"][$row["user_id"]][] = $row['skill'];
    //         }
            
    //     }
    // }

    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);
    $data = [];
    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
            $data[$row['id']]['id'] = $row['id'];
            $data[$row['id']]['name'] = $row['name'];
            $data[$row['id']]['skills'] = read_skills($row['id']);
        }
    }

    return $data;
}

function read_skills($id){

    global $conn;
    $sql = "SELECT * FROM skills WHERE user_id = $id";
    $result = mysqli_query($conn, $sql);
    $data = [];
    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }

    return $data;

}

function tambah_user($nama){

    global $conn;
    $sql = "INSERT INTO users VALUES( NULL, '$nama' )";

    if (mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'ditambah';
        header("location: 6b.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        die(mysqli_error($conn));
    }

}


?>