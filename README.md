# Usage

## Step 1: Install through Composer

```bash 
composer require devdr/api-crud-generator
```

## Step 2: Add new Service Provider in config/app.php inside the providers[] array:

```bash
DevDr\ApiCrudGenerator\DrCrudServiceProvider::class
```

## Step 3: User "crud:api-generator" for the crud creation
FYI: Please make sure the parameter should be same as your table name Ex: if the table name is user then you can use command as bellow.

This command generate Model file, Request File, Resource controller file for api and also add resource routes into api.php 
```php
php artisan crud:api-generator User
```

## Step 4: Add this line into your "app/Http/Kernel.php" $routeMiddleware[]

```php
'api.auth' => \DevDr\ApiCrudGenerator\Middleware\CheckAuth::class,
```
Now you can use this 'api.auth' middleware anywhere

#### You can pass the "AUTH-TOKEN" in api headers for the check authentication



## Step 5: After using middleware that in that function you can use the user object by this

```php
$user = $request->get('users');
```

## Step 8: Add this function in the Users Model

```php
public static function findIdentityByAccessToken($token, $type = null)
{
    return static::where(['auth_token' => $token])->first();
}
```
#### OR

without middleware you can use bellow function into the direct controller api action
```php
$user = $this->_checkAuth();
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

##### Enjoy Code :)
