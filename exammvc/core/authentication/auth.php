<?php

//require_once to avoid the error: 
//Fatal error: Cannot declare class User, because the name is already in use in C:\xampp\htdocs\mvcapp\models\user.php on line 13

    require_once(dirname(dirname(__DIR__))."/models/member.php");

    class AuthProvider{

        public $user;
        public $id;

        function __construct($user){

            $this->user = new Member();

            $this->user = $user;


        }

        // Check if the user set in the cookie is logged in.
        public function isLoggedIn(){

            $loggedIn = false;

            session_name("mvcapp");

            session_start();
            //var_dump($_SESSION);
            if(isset($_SESSION)){
                if(!empty($_SESSION["username"])){

                    if(isset($_COOKIE)){
                        if(!empty($_COOKIE["mvcapp"])){

                            if(session_id() == $_COOKIE["mvcapp"]){
                                $loggedIn = true;

                            }
                        }
                    }
                }
            }

            session_write_close();

            return $loggedIn;

        }

        // Login the user
        // We can use an identifier for the user and session instead of the username
        public function login($params, $data){
            //var_dump($data);
            $result = $this->user->getUserbyCredentials($params, $data);

            // $result not empty: means that there is at least one user with the matching username and password

            // Do not do is_null($result) or isset($result) it would give true for an empty array
            //var_dump($this->user);

            if(!empty($result)){

                session_name("mvcapp");

                session_start();
                //var_dump($result);

                // parse_str($data, $dataArray);

                // $_SESSION["username"] = $dataArray["username"];

                $_SESSION["username"] = $data["username"];
                //var_dump($result);
                $_SESSION["member_id"] = $result["id"];
                //var_dump($result[(int)"id"]);
                session_write_close();

                return true;

            }else{

                return false;
            }

        }


    }

?>