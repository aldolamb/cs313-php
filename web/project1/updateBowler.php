<?php
    session_start();
    include '../db.php';
    try
    {
        if ($_SESSION['id']) {
            $first = $_POST['first'];
            $last = $_POST['last'];
            $dob = $_POST['dob'];
            $username = $_POST['username'];
            $id = $_SESSION['userid'];
            $query = 'UPDATE bowler SET first=:first, last=:last, dob=:dob, username=:username WHERE id=:id;';
            $statement = $db->prepare($query);
            $statement->bindValue(':first', $first);
            $statement->bindValue(':last', $last);
            $statement->bindValue(':dob', $dob);
            $statement->bindValue(':username', $username);
            $statement->bindValue(':id', $id);
            $statement->execute();
        }
        // $scriptureId = $db->lastInsertId("tscriptures_scriptureid_seq");
        // foreach ($_POST['topics'] as $topic)
        // {
        //     echo 'Scripture ID: '.$scriptureId.' Topic ID: '.$topic;
        //     $statement = $db->prepare('INSERT INTO tblScriptures_topics(scriptureId, topicId) VALUES(:scriptureId, :topicId)');
        //     $statement->bindValue(':scriptureId', $scriptureId);
        //     $statement->bindValue(':topicId', $topic);
        //     $statement->execute();
        // }
    }
    catch (Exception $ex)
    {
        echo $ex; // bad practice for prod, good for testing.
        die();
    }
    header("Location: index.php");
    die(); 
?>