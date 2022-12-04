<?php

class App
{
    protected $controller = 'home';

    protected $method = 'index';

    protected $params = [];
    
    // when we call relevant url after "TeaSubsidy/Public" it will call App instance constructor
    public function __construct()
    {
        //inside the constructor we need to parse our url
        $url = $this->parseUrl();

        //if first parameter parsed is a valid controller..then
        if(isset($url[0]))
        {   
            
            if(file_exists('../app/controllers/'.$url[0].'.php')){
                $this->controller = $url[0];
                unset($url[0]);
            }
            else
            {
                echo "<h1>Not a 2Valid Route. Not Found Error ( 404 )</h1>";
                exit;
            }
            
        }
        else
        {
            header("Location: ../public/home/index");
        }
        require_once '../app/controllers/'.$this->controller.'.php';

        /*
            when creating a core controller instance $active should paerse in order to
            identify which tab in Navbar should active
            EX: Controller(index) says home tab should active
        */
        if(isset($url[1]))
        {
            $this->controller = new $this->controller($url[1] ? $url[1] : $this->method);
        }
        else
        {
            $this->controller = new $this->controller($this->method);
        }
        // $this->controller() = new $this->controller($active);

        //if second parameter parsed is a valid method in selected controller..then
        if(isset($url[1])){
            if(method_exists($this->controller , $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
            else
            {
                echo "<h1>Not a 1Valid Route. Not Found Error ( 404 )</h1>";
                exit;
            }
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller , $this->method] , $this->params);
    }

    //protected because access only from inside this class
    protected function parseUrl()
    {
        if(isset($_GET['url']))
        {
            return explode('/' , filter_var(rtrim($_GET['url'] , '/') , FILTER_SANITIZE_URL));
        }
    }
}

?>