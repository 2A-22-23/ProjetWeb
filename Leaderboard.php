<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="leaderboard_style.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>


<?php


$sql = "SELECT * FROM gpoints ORDER BY points DESC";
try {
    $db = config::getConnexion();
    $query = $db->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();
} catch(Exception $e) {
    echo 'Error :' .$e->getMessage();
}

echo '<h1>Leaderboard</h1>';
echo '<table>';
echo '<tr><th>Rank</th><th>User</th><th>Points</th></tr>';
$rank = 1;
foreach($result as $row) {
    echo '<tr>';
    echo '<td>'.$rank.'</td>';
    echo '<td>'.$row['nom'].'</td>';
    echo '<td>'.$row['points'].'</td>';
    echo '</tr>';
    $rank++;
}
echo '</table>';

?>
</body>
</html>
