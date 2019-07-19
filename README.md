# Usage

## Step 1: Install through Composer

```bash 
composer require devdr/api-crud-generator
```

## Step 2: Add new Service Provider in config/app.php inside the providers[] array:

```bash
DevDr\ApiCrudGenerator\DrCrudServiceProvider::class
```

## Step 3: Add this function inside the "app/Exceptions/Handler.php"

```php
public function _errorMessage($responseCode = 400, $message = 'Bad Request'){
    $body = Json::encode(
        array(
            "success" => false,
            "responseCode" => $responseCode,
            'message' => $message
        )
    );
    echo $body;
    die;
}
```

## Step 4: Add those functions in the "render()"

```php
public function render($request, Exception $exception)
{
    if($exception instanceof NotFoundHttpException){
        $this->_errorMessage(404,'Page Not Found');
    }

    if ($exception instanceof MethodNotAllowedHttpException) {
        $this->_errorMessage(405,'Method is not allowed for the requested route');
    }

    return parent::render($request, $exception);
}
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

##### Enjoy Code :)
