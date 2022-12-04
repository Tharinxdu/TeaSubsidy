<?php

class App
{
    protected $controller = 'home';

    protected $method = 'index';

    protected $params = [];
    //inside the constructor we need to parse our url
    //so when we call relevant url after "public/
    public function __construct()
    {
        echo "hello";
    }
}

?>