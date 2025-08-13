NotesApp PHP Backend
This repository contains the PHP backend APIs for the NotesApp Android application. The backend uses a MySQL database to perform CRUD operations on notes.

Setup Instructions
1. Requirements
PHP 7.x or above

MySQL Server

A web server like Apache or Nginx (XAMPP or MAMP recommended for local setup)

2. Database Setup
Create a MySQL database named notes_db (or your preferred name).

Import the following SQL to create the notes table:

sql
Copy
Edit
CREATE TABLE notes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    deleted INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
3. Configure PHP files
Open each PHP file (notes_create.php, notes_update.php, etc.).

Update the database connection settings (host, username, password, database) at the top of each file to match your MySQL credentials.

php
Copy
Edit
$host = "localhost";
$username = "root";
$password = "";
$database = "notes_db";
4. Run the Backend
Place the PHP files in your web server’s root directory or a subdirectory.

Make sure your web server and MySQL server are running.

Test the APIs by accessing them via HTTP requests (e.g., http://localhost/notes_create.php).

API Endpoints
Method	URL	Description
GET	notes_list.php	Get all notes
POST	notes_create.php	Create a new note
POST	notes_update.php	Update an existing note
POST	notes_delete.php	Soft-delete a note

Usage
Use these APIs with your Android app or any HTTP client (Postman, Curl).

All POST requests expect form data fields: title, content, and id when updating or deleting.
