<?php
$servername = "localhost";
$username = "admin";
$password = "admin";
$dbname = "arkademy";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT users.name name_programmer, COUNT(skills.id) jumlah_skill 
        FROM users JOIN skills ON users.id = skills.user_id GROUP BY users.name";

$result = mysqli_query($conn, $sql);
$data = [];
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_array($result)) {
        $data[] = $row;
    }
} else {
    echo "0 results";
}

mysqli_close($conn);

?>

<table border="1">
    <thead>
        <tr>
            <th width="200px">name_programmer</th>
            <th>jumlah_skill</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $d): ?>
        <tr>
            <td><?= $d['name_programmer'] ?></td>
            <td align="center"><?= $d['jumlah_skill'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>