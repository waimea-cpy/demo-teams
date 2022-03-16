<?php

    require_once 'common-top.php';

    echo '<div class="card">';
    echo '<h2>Creating Team...</h2>';

    // Check if image file exists
    if( !isset( $_FILES['logo'] ) ) showErrorAndDie( 'Missing Logo' );

    // Check that all data fields exist
    if( !isset( $_POST['name'] )    || empty( $_POST['name'] ) )    showErrorAndDie( 'Missing Name' );
    if( !isset( $_POST['website'] ) || empty( $_POST['website'] ) ) $_POST['website'] = null;


    // Upload the image to the server and get the new randomised filename
    $logoFilePath = uploadImage( $_FILES['logo'], 'uploads', true );


    // Setup query
    $sql = 'INSERT INTO teams (name, logo, website)
            VALUES (?, ?, ?)';
    $types = 'sss';
    $data = [
        $_POST['name'], 
        $logoFilePath,
        $_POST['website']
    ];

    // Send data to server
    modifyRecords( $sql, $types, $data );

    // If we get here, all went well!
    showStatus( 'Success!' );
    echo '</div>';

    // Head back to the home page
    addRedirect( 2000, 'index.php' );

    require_once 'common-bottom.php';
?>    