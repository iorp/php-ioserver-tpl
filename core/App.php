<?php
namespace Iorp\Cluster;
class App{
    private $routes = [];

    // add a route
    //$method, $path,[$middlewares...], $callback
    public function route(){
       // Retrieve arguments
        $args = func_get_args();

 
    $method = null; if (count($args) >= 1)   $method = array_shift($args);
    $path = null;if (count($args) >= 1)  $path = array_shift($args);
    $callback = null;if (count($args) >= 1)  $callback = array_pop($args); 
    $middlewares = $args;

    // RetrievAdd to routes
    if (!isset($this->routes[$method]))   $this->routes[$method] = []; 
    $this->routes[$method][$path] = ['callback' => $callback, 'middlewares' => $middlewares];

    }

    // public function addRoute($method, $path, $callback, $middleware = null) {
    //     if (!isset($this->routes[$method]))   $this->routes[$method] = [];

    //     $this->routes[$method][$path] = ['callback' => $callback, 'middleware' => $middleware];
    // }

    public function run($requestMethod, $requestPath) {
        if (isset($this->routes[$requestMethod][$requestPath])) {
            $route = $this->routes[$requestMethod][$requestPath];
            $callback = $route['callback'];
            $middlewares = $route['middlewares'];

          
                        
            // Call each function in the array
            if ($middlewares !== null) {
            foreach ($middlewares as $middleware) {
                $middleware(); // Call the function
            }
        }

            $response = $callback();
            //echo $response;
        } else {
            http_response_code(404);
            echo 'Route not found.';
        }
    }

    public function listen() {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        $this->run($requestMethod, $requestPath);
    }

  public static function res($response,$autoHeader=true){ 
        global $_db;
        if($autoHeader==true)  header('Content-Type: corelication/json');  
        if(isset($_db->con->server_info))  $_db->con -> close(); 
      if (is_string($response)) die($response);
      die( json_encode( $response, JSON_NUMERIC_CHECK ));
      } 
      
      // builds an error, and dies with it 
      public static function err($exception){
       
         self::res((object)['error'=>true,'exception'=>($exception)]);
        
        } 
 
}
