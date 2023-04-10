# CodeIgniter 4 Self Installer

## What is CodeIgniter 4 Self installer?

This repository contains self installation wizad for codeigniter 4 based applications you create. This is just an example for creating self installer for your application.

## Installation

Just clone the repository to your webroot and browse to http://<yourdomain>/public or point your domain to public folder to get url like http://<yourdomain>/

## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
