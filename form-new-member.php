<?php

    require_once 'common-top.php';

    // Get the names of all the teams
    $sql = 'SELECT id, name FROM teams ORDER BY name ASC';
    $teams = getRecords( $sql );
?>

<form class="card" method="POST" action="process-new-member.php">
    <h2>Enter New Team Member's Details...</h2>

    <label>Forename</label>
    <input name="forename" type="text" required>

    <label>Surname</label>
    <input name="surname" type="text" required>

    <label>Team</label>
    <select name="team" required>
<?php
    foreach( $teams as $team ) {
        echo '<option value="'.$team['id'].'">'.$team['name'].'</option>';
    }
?>
    </select>

    <label>Team Role</label>
    <select name="role" required>
        <option>Rider</option>
        <option>Manager</option>
        <option>Coach</option>
        <option>Mechanic</option>
        <option>Driver</option>
        <option>Nutritionist</option>
    </select>

    <input type="submit" value="Create Member">
</form>


<?php

    require_once 'common-bottom.php';

?>

