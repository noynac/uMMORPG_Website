# uMMORPG Website

A PHP login/register system for uMMORPG, compatible with both MySQL and SQLite databases.

## Introduction

Hi, I'm noynac! Feel free to create an issue if your having problems.
This is meant to be a basic example website to build off of. Though you are free to use it as is, if you'd like.

## Requirements
* A web server, the most popular ones are Nginx and Apache.
* PHP 7.x
* SQLite3
* MySQL (if you're not using SQLite)
* Ensure you have PDO drivers installed and enabled.

## Setup
* Clone repository with ``git clone https://github.com/noynac/uMMORPG_Website.git``.
* Move the files inside the ``public_html`` folder into your main web directory.
* Move the ``resources`` folder one directory up from your main web directory.
* Open the file ``config.php`` located in ``resources/core/config.php``.
* Edit the configuration to fit your needs.
* If you're using Remote SQL with MySQL, remember to allow your web server IP to access the MySQL server.
* If you're using SQLite, you'll need to CHMOD your database and folder permissions to allow the server to write to it.

## Configuration Options

As many of the settings from config.php are self explanatory, I won't include all of them here.

Please note that your password salt may not be on line 210 depending on your version of uMMORPG you use & 
the changes you may have previously made. It is also important to mention that once you change the salt,
no pre-existing accounts will be able to login.

| Name | Description | Options |
| ------ | ------ | ------ |
| database_type | Select the database type for your project. | SQlite, MySQL |
| has_ssl | Adds an additional header and enables ``secure`` flag for sessions. Requires SSL | true, false |
| password_salt | Can be found in NetworkManagerMMO.cs on line 210. Default is "at_least_16_byte". ``hash=Utils.PBKDF2Hash(loginPassword,"at_least_16_byte"+loginAccount);``| Can be any string. |
| alphanumeric_names | Only allows alphanumeric account names if true. If false, strip tags and slashes. | true, false |
| project_name | Changes the navigation bar text as well as sets the ``server`` header and session name. | Can be any string. |

### Todo

 - Add character search page
 - Add view character page w/ stats
 - Add email option with email verification
