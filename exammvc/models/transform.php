<?php

    // What is the difference between include and require?
    // include will not break the code if the file doesn't exist
    // require the code in this fille will not execute if the required file doesn't exist
    
    // __DIR__ gives the path to the current directory: htdocs/mvcapp/models
    // dirname gives the path to the parent directory of the parameter
    //// dirname(__DIR__): htdocs/mvcapp
    
    require_once(dirname(__DIR__)."/core/database/dbconnectionmanager.php");

    class Recipe {

        public $id;
        public $recipe_name;
        public $img_src;
        public $cookingtime;
        public $ingredient;
        public $detailed_recipe;
        public $count_of_comments;
        public $member_id;
        public $collection_id;

        //public $picture;

        private $conn;

        function __construct(){

            $connectionManager = DBConnectionManager::getInstance();

            $this->conn = $connectionManager->getConnection();

        }

        function createrecipe($params, $payload, $img_src, $memberid){
            
            
            var_dump($payload);
           
            if(!empty($payload)){
                //$cid = (int)$payload["collection"];
                $query = "insert into recipe (recipe_name,img_src, cookingtime, ingredient, detailed_recipe, member_id, collection_id) 
                values (:recipe_name,:img_src,:cookingtime, :ingredient, :detailed_recipe, :member_id, :collection_id)";
                $statement = $this->conn->prepare($query);                  
                
                $statement->execute(array(":recipe_name" => $payload["rname"],
                                        ":img_src" => $img_src,
                                        ":cookingtime" => $payload["ctime"],
                                        ":ingredient" => $payload["ingredient"],
                                        ":detailed_recipe" => $payload["procedure"],
                                        ":member_id" => ((int)$memberid),
                                        ":collection_id" => ((int)($payload["collection"]))));
                // Return the number of rows created    
 

                return $statement->rowCount();
                
            }

            return 0;

        }
        function listrecipe($recipeid){

            if($recipeid==0){
                $query = "select * from recipe";
                $statement = $this->conn->prepare($query); 
                $statement->execute(); 
            }
            else{
            
                $query = "select * from recipe where id = :id";
                $statement = $this->conn->prepare($query) ; 
                $statement->execute([ 'id' => $recipeid]);

            }
			
			return $statement->fetch(PDO::FETCH_ASSOC);           

        }
        // Functions that support the CRUD functionality
        /*function list($params, $data){

            if(empty($params[1])){
                $query = "select * from member";
                $statement = $this->conn->prepare($query); 
                $statement->execute(); 
            }
            else{
            
                $query = "select * from member where id = :id";
                $statement = $this->conn->prepare($query) ; 
                $statement->execute([ 'id' => $params[1] ]);

            }
			
			return $statement->fetchAll(PDO::FETCH_CLASS);           

        }*/
    }
?>    