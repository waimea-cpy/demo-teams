<?php

    require_once 'common-top.php';

    // The query to get all the diary entries
    $sql = 'SELECT members.forename,
                   members.surname,
                   members.role,
                   members.team,

                   teams.name,
                   teams.logo

            FROM members
            JOIN teams ON members.team = teams.id

            ORDER BY teams.name ASC, members.surname ASC';

    // Run the query on the server to get data
    $members = getRecords( $sql );

    echo '<ol id="member-list">';

    foreach( $members as $member ) {

        echo '<li class="member card">';

        echo   '<p>';
        echo     '<strong>'.$member['forename'].' '.$member['surname'].'</strong> ';
        echo     '<em>('.$member['role'].')</em>';
        echo   '</p>';

        echo   '<p>';
        echo     '<a href="show-team.php?id='.$member['team'].'">';
        echo       '<strong>'.$member['name'].'</strong>';
        echo       '<img src="'.$member['logo'].'" alt="team logo">';
        echo     '</a>';
        echo   '</p>';

        echo '</li>';
    }

    echo '</ol>';

    require_once 'common-bottom.php';

?>