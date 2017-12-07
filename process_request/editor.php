<?php

if (!array_key_exists("user",$_SESSION))  {
    Redirect("/i/login");
    exit;
}

if (array_key_exists('path',$_REQUEST))  {
    // naive path validation
    if (preg_match('/^\./',$_REQUEST['path']) || !preg_match("/^\/home\/".$_SESSION['user']."\//",$_REQUEST['path']))  {
        Redirect("/i/editor");
        exit;
    }

    if (array_key_exists('action',$_REQUEST) && $_REQUEST['action']=='save' && array_key_exists('data',$_REQUEST))  {
        file_put_contents($_REQUEST['path'],$_REQUEST['data']);

        print json_encode(["status" => "success"]);
        exit;
    }  

    // Load current file
    $GLOBALS['file_data'] = file_get_contents($_REQUEST['path']);
}

?>
