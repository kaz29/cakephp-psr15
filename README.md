# PSR-15 Middleware support for CakePHP

## Installation

Install the latest version with

```
$ composer require kaz29/cakephp-psr15:dev-master
```

## Basic Usage

### Application.php

Add your PSR-15 middleware referring to the following sample.

```
...
        $middlewareQueue
            // Catch any exceptions in the lower layers,
            // and make an error page/response
            ->add(new ErrorHandlerMiddleware(null, Configure::read('Error')))
            ->add(new PsrMiddleware(new YourPsr15Middleware()))
....
```

## Author

Kazuhiro Watanabe - cyo [at] mac.com - [https://twitter.com/kaz_29](https://twitter.com/kaz_29)

## License

Phai is licensed under the MIT License - see the LICENSE file for details

