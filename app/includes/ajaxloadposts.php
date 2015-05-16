<?php
$playlist_id = 0;
$db = new PDO('mysql:host=localhost;dbname=listar;charset=utf8', 'root', 'root');

try{
    foreach($db->query('SELECT * FROM tracks WHERE playlist_id = '.$playlist_id.' ORDER BY karma DESC') as $row){
        echo '<li id="'.$row['id'].'" class = "trackwrap">';
        echo    '<div class = "scorewrap">';
        echo        '<div class = "trackscore">'.$row['karma'].' points</div>';
        echo        '<button class = "upvote" type="button">+</button>';
        echo        '<button class = "downvote" type="button">-</button>';
        echo        '<button class = "deletebutt" type="button">delete</button>';
        echo    '</div>';
        echo    '<a  class = "tracklink" href="'.$row['url'].'">'.$row['title'].'</a>';
        echo '</li>';
    }
    if (empty($row)){
      echo '<li id="emptylistmessage"><p>list is empty :(</p><p>add some stuff above</p></li>';
    }
}
catch(PDOException $ex) {
    echo "something is wrong";
    some_logging_function($ex->getMessage());
}
?>
