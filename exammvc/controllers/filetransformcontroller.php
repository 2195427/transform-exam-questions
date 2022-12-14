<!DOCTYPE html>
<html>
<body>


<?php
ini_set('max_excution_time',600);
set_time_limit(600);

require_once(dirname(__DIR__)."/models/transform.php");
require_once(dirname(__DIR__)."/models/upload.php");

class FileTransformController{

    private $conn;

    private $msg;
 

    function index($action, $params, $payload){
        echo "Transformed Exam Sheet Display";
        echo "</br>";
        echo "</br>";
        echo '
        <form action="index.php?params=FileHome" method="post" enctype="multipart/form-data">
        Press right button to back to Demo Page.
        <input type="submit" value="Home" name="submit">
        </form>';
        echo "</br>";
        echo 'The tranformed exam sheet for students is downloaded, <a href="../exammvc/temp/trans'.$action.'">Students Copy</a>';
        echo "</br>";
        echo 'The tranformed exam sheet for professor is downloaded, <a href="../exammvc/temp/teachtrans'.$action.'">Professor Copy</a>';
        echo "</br>";
        echo "</br>";
        $target_dir = "temp/";
        $file_path = $target_dir . basename($action);
        $trans_file_path = $target_dir .'trans' .basename($action);
        $teach_trans_file_path = $target_dir .'teachtrans' .basename($action);
        if(file_exists($file_path)){
            if(file_exists($trans_file_path))
                unlink($trans_file_path);
            if(file_exists($teach_trans_file_path))
                unlink($teach_trans_file_path);
        
            $fp = fopen($file_path,"r");
            $fpw = fopen($trans_file_path,"w");
            $fpwa = fopen($teach_trans_file_path,"w");
            
            $str ="";
            $segnum = 0;
            $id=0;
            $option1="";
                        $option2="";
                        $option3="";
                        $option4="";
                        $option5="";
                        $detail="";
            

        while(!feof($fp)){
        
            $str = fgets($fp);//line read
            $str = str_replace("\r\n","",$str);
            trim($str);
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
                        if ($id>5)
                        $detail=$id.'.'.$str;
                        else{
                            //do tranform to $str here
                           // var_dump($str);
                           $str1=str_replace(' ','_',$str);
                           $str2=str_replace('\'','',$str1);
                           $str3=str_replace('.',',', $str2);
                           //$str_after_transform=system("python ../pegasusPara.py $str3");
                           exec("python ../pegasusPara.py $str3",$str_after_transform, $res);
                            //var_dump($str_after_transform);
                            $detail=$id.'.'.$str_after_transform[0];
                            unset($str_after_transform);
                           // var_dump($str_after_transform);
                        }
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
                        fwrite($fpw,$detail."\r\n");

                        fwrite($fpw,$option1."\r\n");
                        fwrite($fpw,$option2."\r\n");
                        fwrite($fpw,$option3."\r\n");
                        fwrite($fpw,$option4."\r\n");
                        if (!(empty($option5)))
                            fwrite($fpw,$option5."\r\n");
                        fwrite($fpw,"\r\n");
                        fwrite($fpwa,$detail."\r\n");
                        fwrite($fpwa,$answer."\r\n");
                        fwrite($fpwa,$option1."\r\n");
                        fwrite($fpwa,$option2."\r\n");
                        fwrite($fpwa,$option3."\r\n");
                        fwrite($fpwa,$option4."\r\n");
                        if (!(empty($option5)))
                            fwrite($fpwa,$option5."\r\n");
                        fwrite($fpwa,"\r\n");
                        break;              

                }
            }

        }
        

        //close file
        fclose($fp);
        fclose($fpw);
        fclose($fpwa);
        }

    }

}


?>
</body>
</html>