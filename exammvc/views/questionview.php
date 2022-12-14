<?php

class QuestionView{
    
    private $html;

    function __construct(){
        echo '	
        <table width="600" border="1" style="border-collapse: collapse;"> 
        <tr> 
            <th>ID</th> 
            <th>Question Description</th> 
            <th>Transform</th> 
        </tr> ';
    }
    function render($questions){
        $this->questions = $questions;
   
          //foreach ($this->questions as)
          //{
          
            $this->html = '<tr> 
                              <th>'.$this->questions["QuestionID"].'</th> 
                              <th>'.$this->questions["Detail"].'</th> 
                              <th>
                                 <form action="index.php?params=transform&action='.$this->questions["QuestionID"].'" method="post" enctype="multipart/form-data">
                                 <input type="submit" value="Transform Questions" name="submit">
                              </form></th>
                           </tr> 
                           <tr> 
                              <th></th> 
                              <th>'.$this->questions["Option1"].'</th> 
                              <th></th>
                           </tr> 
                           <tr> 
                              <th></th> 
                              <th>'.$this->questions["Option2"].'</th> 
                              <th></th>
                           </tr> 
                           <tr> 
                              <th></th> 
                              <th>'.$this->questions["Option3"].'</th> 
                              <th></th>
                           </tr> 
                           <tr> 
                              <th></th> 
                              <th>'.$this->questions["Option4"].'</th> 
                              <th></th>
                           </tr>
                           ';
          //}

           
            echo $this->html;
            

    
        }
    
    
    function end()
    {
        echo '</table>';
    }
}
    
?>
