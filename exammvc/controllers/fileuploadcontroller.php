<!DOCTYPE html>
<html>
<body>

<?php

require_once(dirname(__DIR__)."/models/upload.php");

class FileUploadController{

    private $conn;

    private $msg;


    function index($action, $params, $payload){
        echo "</br>"; 
        echo "</br>";
        //echo "Exam Sheet Display page";
        
            $uploadModel = new UploadModel();
            
            $dir="temp/";

            if($_FILES["fileToUpload"]["error"] == 0){

                if(isset($_FILES["fileToUpload"]["name"])){
                    $filename=$_FILES["fileToUpload"]["name"]; // This is matching: <input type="file" name="fileToUpload"
                }else{

                    $this->msg=$_FILES["fileToUpload"]["error"];
                }
                if ($uploadModel->save($dir,$filename)==0)//upload file and save to temp/ 
                {
                    $this->msg=$uploadModel->errmsg;
                    
                }else{
                    echo '
                    <form action="index.php?params=FileTransform&action='.$filename.'" method="post" enctype="multipart/form-data">
                    Exam Sheet Display page
                    <input type="submit" value="Transform Questions" name="submit">
                    </form>';
                    echo "</br>";
                    echo "</br>";
                    $this->displayfile($dir,$filename);
                    //after inport to database, remove temp file
                    //unlink($dir.$filename); 
                }
                
                
            }
            // If there is no error
            else{

                $this->msg="error: ".$_FILES["fileToUpload"]["error"];

            }  
    }
    function displayfile($target_dir ,$filename){
        $file_path = $target_dir . basename($filename);
        
                      

        if(file_exists($file_path)){
        
        $fp = fopen($file_path,"r");
        
        $str ="";
        $segnum = 0;
        $id=0;
        $detail=$id.'.'.$str;
        $option1="";
        $option2="";
        $option3="";
        $option4="";
        $option5="";
        while(!feof($fp)){
        
            $str = fgets($fp);//line read
            $str = str_replace("\r\n","",$str);
            if(!empty($str))
            {
                //var_dump(strpos($str,"NSWER:"));
                if ($segnum!=0)
                {
                    if (strpos($str,"NSWER:")==1)
                        $segnum=6;
                }
                switch ($segnum) {
                    case 0:
                        $id=$id+1;
                        $detail=$id.'.'.$str;
                        $option1="";
                        $option2="";
                        $option3="";
                        $option4="";
                        $option5="";
                        $answer="";
                        $segnum=1;
                        break;
                    case 1:
                        $option1=$str;
                        $segnum=2;
                        break; 
                    case 2:
                        $option2=$str;
                        $segnum=3;
                        break;
                    case 3:
                        $option3=$str;
                        $segnum=4;
                        break;
                    case 4:
                        $option4=$str;
                        $segnum=5;
                        break; 
                    case 5:
                        $option5=$str;
                        $segnum=6;
                        break;
                    case 6:
                        $answer=$str;
                        $segnum=0;
                        echo $detail;
                        echo "</br>";
                        echo $answer;
                        echo "</br>";
                        echo $option1;
                        echo "</br>";
                        echo $option2;
                        echo "</br>";
                        echo $option3;
                        echo "</br>";
                        echo $option4;
                        echo "</br></br>";

                        break;              

                }
            }
            //var_dump($str);
            //if(!empty($str))
            //{
            //    echo $str;
             //   echo "</br>";
            //}
        }
        
        //$str = str_replace("\r\n","",$str);
        
        // echo $str;
        //close file
        fclose($fp);
        }

    }
    

}


?>
</body>
</html>