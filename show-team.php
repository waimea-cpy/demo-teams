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

    // Show the team
?>
    <div class="team card">

        <h2><?= $team['name'] ?></h2>
        <img class="logo" src="<?= $team['logo'] ?>" alt="team logo">

        <h3>Website</h3>
        <p> <img src="images/link.svg"> <a href="<?= $team['website'] ?>"><?= $team['website'] ?></a></p>

        <h3>Riders</h3>
        <ul class="member-list">

<?php
    // Setup query to get riders
    $sql='SELECT forename, surname, role 
          FROM members
          WHERE team=? 
          ORDER BY role DESC, surname ASC';

    // Run the query
    $members = getRecords( $sql, 'i', [$teamID] );

    foreach( $members as $member ) {
        echo '<li>';
        echo   '<strong>'.$member['forename'].' '.$member['surname'].'</strong> ';
        echo   '<em>('.$member['role'].')</em>';
        echo '</li>';
    }
?>
        </ul>


        <div id="new-member">
            <label for="new-toggle"><img src="images/plus.svg"></label>
            <input id="new-toggle" type="checkbox">

            <form class="card" method="POST" action="process-new-member.php">
                <h4>Add a New Team Member</h4>

                <label>Forename</label>
                <input name="forename" type="text" required>

                <label>Surname</label>
                <input name="surname" type="text" required>

                <input name="team" type="hidden" value="<?= $teamID ?>">

                <label>Team Role</label>
                <select name="role" required>
                    <option>Rider</option>
                    <option>Manager</option>
                    <option>Coach</option>
                    <option>Mechanic</option>
                    <option>Driver</option>
                    <option>Nutritionist</option>
                </select>

                <input type="submit" value="Add Team Member">
            </form>
        </div>

    </div>';

<?php

    require_once 'common-bottom.php';

?>
