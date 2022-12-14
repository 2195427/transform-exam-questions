<?php

    require("request.php");

class RequestBuilder {

    private $request;

    function buildRequest(){

        // $this->request->method = $_SERVER['REQUEST_METHOD'];
        // $this->request->url = $_SERVER['REQUEST_URI'];
        // $this->request->urlparams = $_GET;
        // $this->request->header = getallheaders();
        // $this->request->payload = Read the form values from the $_POST array
        // file_get_contents('php://input'); Is not available with enctype="multipart/form-data"       

        //new Request($method, $url, $urlparams, $header, $payload);

        // For a form with a File upload instead of this:
        // $this->request = new Request( $_SERVER['REQUEST_METHOD'], 
        //     $_SERVER['REQUEST_URI'], 
        //     $_GET, 
        //     getallheaders(), 
        //     file_get_contents('php://input'));

        // we do this:

        $this->request = new Request( $_SERVER['REQUEST_METHOD'], 
            $_SERVER['REQUEST_URI'], 
            $_GET, 
            getallheaders(), 
           $_POST);

    }

    function getRequest(){

        $this->buildRequest();

        return $this->request;

    }

}


?>