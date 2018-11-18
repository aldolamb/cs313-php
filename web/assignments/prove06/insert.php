<?php
    include '../../db.php';
    try
    {
        $query = '';
        $totals = explode(',', $_POST['total']);
        if ($_POST['creation_date']) {
            $query = 'INSERT INTO game (bowler, total, creation_date) VALUES ';
            foreach ($totals as $total)
            {
                $query = $query.'('.$_POST['bowler'].','.$total.',date(\''.$_POST['creation_date'].'\')), ';
            }
        } else {
            $query = 'INSERT INTO game (bowler, total) VALUES ';
            foreach ($totals as $total)
            {
                $query = $query.'('.$_POST['bowler'].','.$total.'), ';
            }
        }
       
        $query = substr($query, 0, -2).';';
        // $statement->bindValue(':book', $_POST['book']);
        // $statement->bindValue(':chapter', $_POST['chapter']);
        // $statement->bindValue(':verse', $_POST['verse']);
        // $statement->bindValue(':content', $_POST['content']);
        // $statement->execute();
        $db->query($query);
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