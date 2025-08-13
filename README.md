NotesApp PHP Backend
This repository contains the PHP backend APIs for the NotesApp Android application. The backend uses a MySQL database to perform CRUD operations on notes.

Setup Instructions
1. Requirements
PHP 7.x or above
MySQL Server

A web server like Apache or Nginx (XAMPP or MAMP recommended for local setup)

**2. Database Setup**
Step-by-step plan (super simple)
Install & run XAMPP (Windows/Mac) → start Apache + MySQL.

**Open phpMyAdmin → create DB/table with the SQL below.**

Create folder **htdocs/notes_api/** and put the 5 PHP files there.

Step-by-step plan (super simple)
Install & run XAMPP (Windows/Mac) → start Apache + MySQL.

Open phpMyAdmin → create DB/table with the SQL below.

**Create folder htdocs/notes_api/ and put the 5 PHP files there.**

Test in browser:

http://YOUR_PC_IP/notes_api/notes_list.php → should return JSON.

Update your Android baseUrl to http://YOUR_PC_IP/notes_api/ and replace/add the code I give below.

Run the app → Add/Edit/Delete notes.

Get your PC IP (same Wi-Fi as phone): Windows ipconfig → IPv4, Mac ifconfig | grep inet.

**1) MySQL — Schema (phpMyAdmin → SQL)**
sql
CREATE DATABASE IF NOT EXISTS notesdb CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE notesdb;

CREATE TABLE IF NOT EXISTS notes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  content TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  last_modified TIMESTAMP NULL DEFAULT NULL,
  deleted TINYINT(1) DEFAULT 0,
  version INT DEFAULT 1
);

http://YOUR_PC_IP/notes_api/notes_list.php → should return JSON.

Update your Android baseUrl to http://YOUR_PC_IP/notes_api/ and replace/add the code I give below.

Run the app → Add/Edit/Delete notes.

Get your PC IP (same Wi-Fi as phone): Windows ipconfig → IPv4, Mac ifconfig | grep inet.


**1) MySQL — Schema (phpMyAdmin → SQL)**
sql
CREATE DATABASE IF NOT EXISTS notesdb CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE notesdb;

CREATE TABLE IF NOT EXISTS notes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  content TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  last_modified TIMESTAMP NULL DEFAULT NULL,
  deleted TINYINT(1) DEFAULT 0,
  version INT DEFAULT 1
);
API Endpoints
Method	URL	Description
GET	notes_list.php	Get all notes
POST	notes_create.php	Create a new note
POST	notes_update.php	Update an existing note
POST	notes_delete.php	Soft-delete a note

Usage
Use these APIs with your Android app or any HTTP client (Postman, Curl).

All POST requests expect form data fields: title, content, and id when updating or deleting.
