# Bera Logger

Bera Logger is simple php logger which you can use in your php projects to log information.

## Installation

```bash
git clone https://github.com/joykumarbera/Logger.git
composer install --no-dev --optimize-autoloader
```

## Usage
create a new php file and add the following
```php
include 'vendor/autoload.php';
$log = new Bera\Joy\Logger('log.txt',__DIR__);
$log->log('dev is working and working now'); 
// 2020-04-13 13:10:07 :: INFO :: dev is working and working 
```
you can also modify error levels indication for example:

```php
include 'vendor/autoload.php';
$log = new Bera\Joy\Logger('log.txt',__DIR__);
$log->log('dev is working and working now' , 'ERROR'); 
// 2020-04-13 13:10:07 :: ERROR :: dev is working and working 
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License
[MIT]