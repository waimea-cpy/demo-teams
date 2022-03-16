<?php

    require_once 'common-top.php';

    echo '<div class="card">';
    echo '<h2>Creating Member...</h2>';

    // Check that all data fields exist
    if( !isset( $_POST['forename'] ) || empty( $_POST['forename'] ) ) showErrorAndDie( 'Missing Forename' );
    if( !isset( $_POST['surname'] )  || empty( $_POST['surname'] ) )  showErrorAndDie( 'Missing Surname' );
    if( !isset( $_POST['team'] )     || empty( $_POST['team'] ) )     showErrorAndDie( 'Missing Team ID' );
    if( !isset( $_POST['role'] )     || empty( $_POST['role'] ) )     showErrorAndDie( 'Missing Team Role' );

    // Setup query
    $sql = 'INSERT INTO members (forename, surname, team, role)
            VALUES (?, ?, ?, ?)';
    $types = 'ssis';
    $data = [
        $_POST['forename'], 
        $_POST['surname'], 
        $_POST['team'],
        $_POST['role']
    ];

    // Send data to server
    modifyRecords( $sql, $types, $data );

    // If we get here, all went well!
    showStatus( 'Success!' );
    echo '</div>';

    // Head back to the home page
    addRedirect( 2000, 'show-team.php?id='.$_POST['team'] );

    require_once 'common-bottom.php';
?>    