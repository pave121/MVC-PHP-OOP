<?php
// from url through $_GET getting action and controller
//www.mapage.com/controller/action
//www.manage.com/users/registration

class Bootstrap{
    private $controller;
    private $action;
    private $request;
    
    public function __construct($request){
        $this->request = $request;
        
        if($this->request['controller'] == ""){
            $this->controller = 'home';  
        }
        else{
            $this->controller = $this->request['controller'];
        }
        if($this->request['action'] == ""){
            $this->action = 'index';
        }
        else{
            $this->action = $this->request['action'];
        }
        
    }
    
    public function createController(){
        //check for class
        if(class_exists($this->controller)){
            $parents = class_parents($this->controller);
            //check extend
            if(in_array("Controller", $parents)){
                if(method_exists($this->controller, $this->action)){
                    return new $this->controller($this->action, $this->request);
                }
                else{
                    //method nonexistant
                    echo "<h1>Method does not exist</h1>";
                    return;
                }
            }
            else{
                //Base controller not found
                echo "<h1>Base controller not found</h1>";
                return;
            }
        }
        else{
             // controller class not found
            echo "<h1>Controller class does not exist</h1>";
            return;
            }
    }
}
