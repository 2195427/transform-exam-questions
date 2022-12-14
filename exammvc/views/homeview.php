

<?php
require_once(dirname(__DIR__)."/views/questionview.php");

class HomeView{
    
    private $html;


    private $Message;

    function __construct($Message){
        //var_dump($Message);

        $this->Message = $Message;


        $this->render();

    }
    function render(){

        $this->html = '	
            <form action="index.php?params=Upload" method="post" enctype="multipart/form-data">
            Select exam .txt file to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload" name="submit">
            </form> '; 
            echo "Exam Transform Demo"; 
            echo "</br>";
            echo "</br>";
            echo $this->html;
            echo "</br>";
            
  
        }
    
    }
    
?>

