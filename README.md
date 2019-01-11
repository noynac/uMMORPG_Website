# uMMORPG Website

A PHP login/register system for uMMORPG, compatible with both MySQL and SQLite databases.

## Introduction

Hi, I'm noynac! you can contact me on Discord at ``noynac#4082`` if you need any help!
This is meant to be a basic example website to build off of. Though you are free to use it as is, if you'd like.

## Requirements
* A web server, the most popular ones are Nginx and Apache.
* PHP 7.x
* SQLite3 ( ```sudo apt-get install php-sqlite3``` )
* MySQL (if you're not using SQLite)
* Ensure you have PDO drivers installed and enabled.

## Setup
* Extract the zip file into your web directory.
* Open the file ``config.php`` located in the ``/includes`` folder.
* Edit the configuration to fit your needs.
* If your're using Remote SQL with MySQL, remember to allow your web server IP to access the MySQL server.
* If you're using SQLite, you'll need to CHMOD your database to ``646`` to allow the server to write to it.

## Configuration Options

As many of the settings from config.php are quite self explanatory, I won't include all of them here.
If you have any questions about something not listed here, or need help changing something not
listed in the configuration, then feel free to message me on [Discord](https://discord.gg).

note: ``password_salt`` option has been removed from the ``$config`` array, and is instead in the hash function directly below it.
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
