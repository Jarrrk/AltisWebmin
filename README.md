AltisWebmin
===========

Live updating web admin panel for the 'Altis Life' servers on ArmA 3. View the official AltisLife website [here](http://altisliferpg.com)!

---

**Please note:** 

This project is still in development and will continue to be updated with core features and user suggestions.

---

Like this project? [Feel free to buy me a drink! :beer:](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=KBU8BMB5235DC)

Requirements
------------
* [PHP 5.4+](http://php.net/downloads.php)
* MySQL server, preferably [MariaDB](https://downloads.mariadb.org)
* A webserver (obviously)

Installation
------------
1. Unzip the contents from the [latest release](https://github.com/Jarrrk/AltisWebmin/releases) and upload them to your site. 
2. Update `assets/php/config.php` with your SQL server credentials. (Same as game server)
3. Upload or run `assets/extra/altisWebmin.sql` on your respective SQL database. (arma3life)
4. Navigate your browser to the domain of where you uploaded the files.
5. Default username and password is: admin & adminPassword
6. Profit ;)

Issues
------
None so far! If you find any feel free to submit a report [here](https://github.com/Jarrrk/AltisWebmin/issues) and I'll get to work *smashing* it.

If you're experiencing undocumented issues this will probably be caused by downloading the repo from the main project page. Please use the latest release from the [release section](https://github.com/Jarrrk/AltisWebmin/releases).

Todo
----
- [ ] Allow for statistic editing (Player bank, rank, vehicles)
- [ ] Allow for easy adding of administrators and moderators

*If you have any suggestions feel free to submit them [here](https://github.com/Jarrrk/AltisWebmin/issues/new), or [submit a pull request](https://github.com/Jarrrk/AltisWebmin/pulls).*

License Info
------------
Copyright (C) 2014 Jack Carlin

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
