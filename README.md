# INF 653 - PHP ToDo List Application

This project is a PHP assignment for INF 653 - Back-End Dev.

**Author:** Jeramee Oliver  
**Date:** 2/25/2024  
**Course:** INF 653 - Back-End Dev

## Project Overview

This PHP project is a ToDo List application that enables users to manage tasks by adding, viewing, and removing items from a list. The application uses PHP for server-side logic and MySQL for database interactions.

## Files

- **index.php:** The main PHP file responsible for displaying the ToDo List and handling form submissions.
- **model/database.php:** PHP script for establishing a connection to the MySQL database.
- **view/remove.php:** PHP script for handling the removal of ToDo items.
- **.gitignore:** Configuration file for Git to ignore specific files and directories.
- **view/add.php

## Setup Instructions

1. Set up a MySQL database named "todolist" with a table named "todoitems" (refer to assignment requirements for table structure).
2. Update `database.php` with your actual database credentials.
3. Ensure that your server environment supports PHP and has PDO enabled for MySQL.
4. Run the PHP application on your server.

## Usage

- Access `index.php` to view and manage your ToDo List.
- Add new items using the provided form.
- Click "Remove" next to each item to delete it from the list and the database.

## Dependencies

- PHP 8.1.0
- MySQL

## Acknowledgments

*This project was created as part of the INF 653 course. Special thanks to the course instructor and resources provided.*
