# Bera Logger

Bera Logger is simple php logger which you can use in your php projects to log information.

## Installation

```bash
composer require bera/logger
```

## Usage
create a new php file and add the following
```php
include 'vendor/autoload.php';
$log = new Bera\Joy\Logger('log.txt',__DIR__);
$log->log('Hello World'); 
// 2020-04-13 13:10:07 :: INFO :: Hello World 
```
you can also modify error levels indication for example:

```php
include 'vendor/autoload.php';
$log = new Bera\Joy\Logger('log.txt',__DIR__);
$log->log('Hello World' , 'ERROR'); 
// 2020-04-13 13:10:07 :: ERROR :: Hello World
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License
[MIT]