<?php
    require_once 'common-functions.php';
?>

<!doctype html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>MTB Enduro Team Tracker</title>

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <header id="main-header">

        <h1><a href="index.php">MTB Enduro Team Tracker</a></h1>

        <nav id="main-nav">
            <label for="toggle"><img src="images/menu.svg"></label>
            <input id="toggle" type="checkbox">

            <ul>
                <label for="toggle"><img src="images/close.svg"></label>

                <li><a href="index.php">Team List</a></li>
                <li><a href="show-members.php">Team Member List</a></li>
                
                <li><a href="form-new-team.php">New Team</a></li>
                <li><a href="form-new-member.php">New Team Member</a></li>
            </ul>
        </nav>
   
    </header>

    <main>