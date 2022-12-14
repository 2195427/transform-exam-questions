<!DOCTYPE html>
<html>
<body>

<?php

require_once(dirname(__DIR__)."/models/upload.php");
require_once(dirname(__DIR__)."/views/filehomeview.php");


class FileHomeController{
    private $conn;

    private $msg;

    private $result; 

  
    function index($action, $params, $payload){
        if (empty($action))
        {
            $action=1;
        }
            
        $homeview =new FileHomeView("");

     
       

        //header("Location: ".ROOTURL."/login/");

    }


}

?>

</body>
</html>