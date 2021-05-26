# Saga Common

## Table Of Contents
- [Requirements](#requirements)
- [About package](#about-package)
- [Installation](#installation)
- [Usage](#usage)
- [License](#license)

## Requirements  
- php: >= 7.1
- [phpsagas/contracts](https://github.com/phpsagas/contracts)

## About package
This component is the part of [phpsagas framework](https://github.com/phpsagas).  
The package contains default implementations of interfaces used by saga participants.

## Installation
You can install the package using [Composer](https://getcomposer.org/):
```bash
composer require phpsagas/common
```

## Usage
You have to implement (or use ready implementation):
- `MessageIdGeneratorInterface` - generate message ids ([uuid implementation](https://github.com/phpsagas/message-id-generator)).

## License
Saga common is released under the [MIT license](LICENSE). 
