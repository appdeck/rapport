rapport
=======

A database evolution sync tool.

[![Total Downloads](https://poser.pugx.org/appdeck/rapport/downloads.png)](https://packagist.org/packages/appdeck/rapport)

Instalation
-----------
This library can be found on [Packagist](https://packagistorg/packages/appdeck/rapport).
The recommended way to install this is through [composer](http://getcomposer.org).

Edit your `composer.json` and add:

```json
{
	"require": {
		"appdeck/rapport": "dev-master"
	}
}
```

And install install dependencies:
```bash
$ curl -sS https://getcomposer.org/installer |  php
$ php composer.phar install
```

Features
--------
 - PSR-0 compliant for easy interoperability
 - Supports MySQL, PostgreSQL, Oracle, MSSQL, SQLite, ODBC (using PDO)

Examples
--------
Examples of basic usage are located in the examples/ directory.

Bugs and feature requests
-------------------------
Have a bug or a feature request? [Please open a new issue](https://github.com/appdeck/sampa/issues).
Before opening any issue, please search for existing issues and read the [Issue Guidelines](https://github.com/necolas/issue-guidelines), written by [Nicolas Gallagher](https://github.com/necolas/).

Versioning
----------
Rapport will be maintained under the Semantic Versioning guidelines as much as possible.

Releases will be numbered with the following format:

`<major>.<minor>.<patch>`

And constructed with the following guidelines:

* Breaking backward compatibility bumps the major (and resets the minor and patch)
* New additions without breaking backward compatibility bumps the minor (and resets the patch)
* Bug fixes and misc changes bumps the patch

For more information on SemVer, please visit [http://semver.org/](http://semver.org/).

Authors
-------
**Flávio Heleno**

+ [http://twitter.com/flavioheleno](http://twitter.com/flavioheleno)
+ [http://github.com/flavioheleno](http://github.com/flavioheleno)

**Vinícius Campitelli**

+ [http://twitter.com/vcampitelli](http://twitter.com/vcampitelli)
+ [http://github.com/vcampitelli](http://github.com/vcampitelli)

Copyright and license
---------------------
Copyright 2013 appdeck under [GPL-3.0](LICENSE).