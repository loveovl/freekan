<?php
return array (
  'default' => 'mysql',
  'connections' => 
  array (
    'sqlite' => 
    array (
      'driver' => 'sqlite',
      'database' => 'fkjm',
      'prefix' => '',
    ),
    'mysql' => 
    array (
      'driver' => 'mysql',
      'host' => 'localhost',
      'port' => 3306,
      'database' => 'freekan',
      'username' => 'root',
      'password' => 'root',
      'unix_socket' => '',
      'charset' => 'utf8',
      'collation' => 'utf8_unicode_ci',
      'prefix' => '',
      'strict' => true,
      'engine' => NULL,
    ),
    'pgsql' => 
    array (
      'driver' => 'pgsql',
      'host' => '127.0.0.1',
      'port' => '3306',
      'database' => 'fkjm',
      'username' => 'fkjm',
      'password' => 'dieyi99520',
      'charset' => 'utf8',
      'prefix' => '',
      'schema' => 'public',
      'sslmode' => 'prefer',
    ),
    'sqlsrv' => 
    array (
      'driver' => 'sqlsrv',
      'host' => '127.0.0.1',
      'port' => '3306',
      'database' => 'fkjm',
      'username' => 'fkjm',
      'password' => 'dieyi99520',
      'charset' => 'utf8',
      'prefix' => '',
    ),
  ),
  'migrations' => 'migrations',
  'redis' => 
  array (
    'client' => 'predis',
    'default' => 
    array (
      'host' => '127.0.0.1',
      'password' => NULL,
      'port' => '6379',
      'database' => 0,
    ),
  ),
);