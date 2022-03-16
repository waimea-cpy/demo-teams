<?php

    require_once 'common-top.php';

    // Make sure we have an ID in the URL
    if( !isset( $_GET['id'] ) || empty( $_GET['id'] ) ) showErrorAndDie( 'Missing ID' );

    // Get the ID from the URL
    $teamID = $_GET['id'];

    // Prepare a query to get the diary entry for this ID
    $sql='SELECT id, name, logo, website FROM teams WHERE id=?';

    // Run the query - should only give one result
    $teams = getRecords( $sql, 'i', [$teamID] );

    // Did we get anything back?
    if( sizeof( $teams ) == 0 ) showErrorAndDie( 'Invalid ID' );

    // If we get here, we got an entry
    $team = $teams[0];

    // Setup query to get riders
    $sql='SELECT forename, surname, role 
          FROM members
          WHERE team=? 
          ORDER BY role DESC, surname ASC';

    // Run the query
    $members = getRecords( $sql, 'i', [$teamID] );

    // Show the team
    echo '<div class="team card">';

    echo   '<h2>'.$team['name'].'</h2>';
    echo   '<img src="'.$team['logo'].'" alt="team logo">';

    echo   '<h3>Riders</h3>';

    echo   '<ul class="member-list">';

    foreach( $members as $member ) {
        echo '<li>';
        echo   '<strong>'.$member['forename'].' '.$member['surname'].'</strong> ';
        echo   '<em>('.$member['role'].')</em>';
        echo '</li>';
    }

    echo   '</ul>';

    echo   '<h3>Website</h3>';
    echo   '<p> <img src="images/link.svg"> <a href="'.$team['website'].'">'.$team['website'].'</a></p>';

    echo '</div>';

    require_once 'common-bottom.php';

?>
