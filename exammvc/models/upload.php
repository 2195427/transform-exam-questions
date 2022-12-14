<?php

    // What is the difference between include and require?
    // include will not break the code if the file doesn't exist
    // require the code in this fille will not execute if the required file doesn't exist
    
    // __DIR__ gives the path to the current directory: htdocs/mvcapp/models
    // dirname gives the path to the parent directory of the parameter
    //// dirname(__DIR__): htdocs/mvcapp
    
    require_once(dirname(__DIR__)."/core/database/dbconnectionmanager.php");

    class UploadModel {

        public $errmsg;

        private $conn;

        function __construct(){

            $connectionManager = DBConnectionManager::getInstance();

            $this->conn = $connectionManager->getConnection();

        }
        
        //save file
        public function save($target_dir,$filename){

            // Name the file that needs to be saved, let's base it on the uploaded file name
            // this is by choice it could be a different name.

            $savedFileName = $target_dir . basename($filename);

            // Flag to keep track whether the upload was successfull or not:
            $uploadOK = 1;

           //Check if file already exists
           if (file_exists($savedFileName)) {
               //$errmsg ="Sorry, file already exists.";
               //$uploadOK = 0;
               unlink($savedFileName);
            }       

            // Check file size
            // The file size needs to be below the settings in Apache and PHP php.ini
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                $this->errmsg ="Sorry, your file is too large.";
                $uploadOK = 0;
            }    
            
            if($uploadOK == 1){

                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $savedFileName)) {
                    $this->errmsg ="The file ". htmlspecialchars( basename($filename)). " has been uploaded.";
                  } else {
                    $this->errmsg ="Sorry, there was an error uploading your file.";
                    $uploadOK = 0;
                  }                    

            }
            return $uploadOK;
        }
        public function listquestions($startid){
           
            $query = "select * from question where QuestionID >= :id1 and QuestionID <= :id2";
            $statement = $this->conn->prepare($query) ; 
            $statement->execute(array("id1" => $startid,"id2" => $startid+9,));
		
			return $statement->fetch(PDO::FETCH_ASSOC);           

        }
        //inport exam file into database
        public function db_inport($target_dir,$filename){
            $file_path = $target_dir . basename($filename);

            if(file_exists($file_path)){
            
            $fp = fopen($file_path,"r");
            
            $str ="";
            $detail=$str;
            $option1="";
            $option2="";
            $option3="";
            $option4="";
            $option5="";
            $answer="";
            $segnum = 0;
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
                            $detail=$str;
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
                            //echo "</br>";
                            echo $answer;
                            //echo "</br>";
                            echo $option1;
                            //echo "</br>";
                            echo $option2;
                            //echo "</br>";
                            echo $option3;
                            //echo "</br>";
                            echo $option4;
                            echo "</br>";
                            $query = "insert into question (Detail,Answer,Option1,Option2,Option3,Option4,Option5) 
                            values (:detail,:answer,:option1,:option2,:option3,:option4,:option5)";
                            $statement = $this->conn->prepare($query);  
                            $statement->execute(array("detail" => $detail,
                            "answer" => $answer,
                            "option1" => $option1,
                            "option2" => $option2,
                            "option3" => $option3,
                            "option4" => $option4,
                            "option5" => $option5));
                            //echo statement->rowCount();
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