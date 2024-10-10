<div align="center">
    <img alt="Schranz Search Logo with a Seal on it with a magnifying glass" src="https://avatars.githubusercontent.com/u/120221538?s=400&v=6" width="200" height="200">
</div>

<div align="center">Logo created by <a href="https://cargocollective.com/meinewilma">Meine Wilma</a></div>

<h1 align="center">SEAL <br /> Loupe Adapter</h1>

<br />
<br />

The `LoupeAdapter` write the documents into a [Loupe](https://github.com/loupe-php/loupe) SQLite instance.

> **Note**:
> This is part of the `schranz-search/schranz-search` project create issues in the [main repository](https://github.com/schranz-search/schranz-search).

> **Note**:
> This project is heavily under development and any feedback is greatly appreciated.

## Installation

Use [composer](https://getcomposer.org/) for install the package:

```bash
composer require schranz-search/seal schranz-search/seal-loupe-adapter
```

## Usage.

The following code shows how to create an Engine using this Adapter:

```php
<?php

use Loupe\Loupe\LoupeFactory;
use Schranz\Search\SEAL\Adapter\Loupe\LoupeAdapter;
use Schranz\Search\SEAL\Adapter\Loupe\LoupeHelper;
use Schranz\Search\SEAL\Engine;

$loupeFactory = new LoupeFactory();

$engine = new Engine(
    new LoupeAdapter(new LoupeHelper($loupeFactory, 'var/indexes/')),
    $schema,
);
```

Via DSN for your favorite framework:

```env
loupe://var/indexes/
loupe://
```

## Authors

- [Alexander Schranz](https://github.com/alexander-schranz/)
- [The Community Contributors](https://github.com/schranz-search/schranz-search/graphs/contributors)
