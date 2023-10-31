 
# Simple PHP App Server

This is a simple PHP application that acts as a basic server for handling HTTP requests. It allows you to define routes and execute callback functions based on the HTTP method and route path.

## Features

- Define routes for GET and POST requests.
- Attach middleware functions to routes.
- Handle incoming HTTP requests.

## Usage

1. Clone or download the repository.

2. Customize the `index.php` file to define your routes, middleware, and callback functions.

3. Add routes using the `addRoute` method, specifying the HTTP method, path, callback function, and optional middleware.

4. Run the server using the `listen` method.

```php
$app = new App();

// Define GET route
$app->addRoute('GET', '/', function () {
    return 'Hello, World!';
});

// Define POST route with middleware
$app->addRoute('POST', '/submit',$myMiddleware0,$myMiddleware1,$myMiddleware2, function () {
    return 'Data submitted successfully.';
});

// Listen for incoming requests
$app->listen();
```

5. Start the server using the built-in PHP web server or configure a production server like Apache or Nginx.

6. Access your application in a web browser or via HTTP requests.

## Dependencies

This project has no external dependencies. It uses basic PHP features to handle HTTP requests and routes.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Acknowledgments

- Inspired by various PHP routing examples.

Feel free to enhance this README with additional sections, usage examples, or documentation to make it more informative for users.