# Temant\Session PHP Package

**Temant\Session** is a PHP package that simplifies session management in PHP applications. It provides an easy-to-use interface for starting and managing sessions, setting and getting session variables, and more.

## Table of Contents

- [Temant\\Session PHP Package](#temantsession-php-package)
  - [Table of Contents](#table-of-contents)
  - [Installation](#installation)
  - [Usage](#usage)
  - [Contributing](#contributing)
  - [Issues](#issues)
  - [License](#license)

## Installation

You can install this package via Composer:
composer require yourusername/temant-session

## Usage
To start using this package, follow these simple steps:

Require your composer autoloader:
```php
require_once('path/to/vendor/autoload.php');
```

Create a Session Instance:
```php
use Temant\SessionManager\Session;
```

Create a new session instance
```php
$session = new Session();
```

Start a new session:
```php
$session->start();
```

Set a session variable:
```php
$session->set('user_id', 123);
```

Get the value of a session variable:
```php
$userID = $session->get('user_id');
```

Check if a session variable exists:
```php
if ($session->has('user_id')) {
    // Do something
}
```

Remove a session variable:
```php
$session->remove('user_id');
```

Regenerate the session ID:
```php
$session->regenerate();
```

Destroy the session:
```php
$session->destroy();
```

## Contributing
Contributions are welcome! If you'd like to contribute to this project, please follow our Contribution Guidelines.

## Issues
If you encounter any issues or have suggestions for improvement, please report them in the Issue Tracker.

## License
This package is open-source software licensed under the MIT License. See the LICENSE file for more information.