<?php

    require_once 'common-top.php';

?>

<form class="card" method="POST" action="process-new-team.php"  enctype="multipart/form-data">
    <h2>Enter New Team's Details...</h2>

    <label>Team Name</label>
    <input name="name" type="text" required>

    <label>Team Logo (best if square)</label>
    <input name="logo" type="file" required>

    <label>Team Website</label>
    <input name="website" type="url">

    <input type="submit" value="Create Team">
</form>


<?php

    require_once 'common-bottom.php';

?>

