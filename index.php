<?php

    require_once 'common-top.php';

    // The query to get all the diary entries
    $sql = 'SELECT id, name, logo 
            FROM teams
            ORDER BY name ASC';

    // Run the query on the server to get data
    $teams = getRecords( $sql );

    echo '<ol id="team-list">';

    foreach( $teams as $team ) {

        echo '<li class="team card">';
        echo   '<a href="show-team.php?id='.$team['id'].'">';
      
        echo     '<h2>'.$team['name'].'</h2>';

        echo     '<img src="'.$team['logo'].'" alt="team logo">';

        echo   '</a>';
        echo '</li>';
    }

    echo '</ol>';

    require_once 'common-bottom.php';

?>