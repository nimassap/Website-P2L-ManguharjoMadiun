<?php 
error_reporting(0);
session_start();
include "koneksi.php";

?>




<!doctype html>
<html>
    <head>
        <title>PHP, MySQL, and YouTube Videos</title>
        <link rel="stylesheet" type="text/css" href="css/style_youtube.css">
        <link rel="icon" href="img/logo4.png">
    </head>
    <body>

        <h1>PHP, MySQL, and YouTube Videos</h1>

        <?php

        $query = 'SELECT id,nama,youtubeid
            FROM tb_videoyoutube
            ORDER BY id';

        $result = mysqli_query($connect, $query);

        if (!$result)
        {
            echo 'Error Message: ' . mysqli_error($connect) . '<br>';
            exit;
        }

        echo '<p>The query found ' . mysqli_num_rows($result) . ' rows:</p>';

        while ($record = mysqli_fetch_assoc($result))
        {

            echo '<hr>';

            echo '<h2>'.$record['nama'].'</h2>';

            $url = 'https://www.youtube.com/watch?v='.$record['youtubeid'];

            echo '<a href="'.$url.'">'.$url.'</a>';

            echo '<br><br>';

            echo '<div class="iframe-container"><iframe src="https://www.youtube.com/embed/'.$record['youtubeid'].'?modestbranding=1" 
                frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen></iframe></div>';

        }

        ?>        
        
    </body>
</html>