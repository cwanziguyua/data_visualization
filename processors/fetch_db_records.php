<?php

include_once $_SERVER['DOCUMENT_ROOT']."/includes/connect_to_db.php";

//$utility_array = array();
//check branch values entered in add branch form
function fetch_db_records($utility_array)
{
    // Get the data from the database
    $mysqli           = connectToDb();
    $check_for_tweets = "SELECT * FROM twitter_text ORDER BY id DESC";
    $tweet_result     = $mysqli->query($check_for_tweets) or handle_database_error(''.$mysqli->error,$check_for_tweets);
    $no_of_records    = $tweet_result->num_rows;

    if($no_of_records>0)
    {
        while($data = $tweet_result->fetch_array(MYSQLI_BOTH))
        {
            $utility_array[] = $data;
            //$data_array['twitter_text'] = $data['text_received'];
        }
    }

    return $utility_array;
}


?>