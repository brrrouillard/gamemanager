# Game Manager
A Game Manager website written in PHP using MVC architecture. 

## Purpose
I started to build this website as a personal project to pratice my abilities in PHP, using the MVC architecture as we saw in class.
In addition to PHP, I also use it to practice my HTML and CSS fundamentals. It also made me use Bootstrap for the first time.
I plan to add some JavaScript (and jQuery) after finishing implemanting the fundamentals of the website.

## Features
- Manage a list of video-games. Sort them by name, editor or release date.
- Add your own games to the list.
- Chat with other users in semi-realtime (refresh needed to show new messages).
- Register and login.

## To Do
- Rewrite the code to make it fully English-written.
- Check security issues (SQL injections, XSS).
- Implement a page to let user modify his informations.
- Implement a way to let a user establish and manage his own games collection.
- Implement an admin panel (users and games management).
- Let people vote for their favorite games and show results next to them.

## Technical overview
- Built from scratch using the Model-View-Controller architecture, using Object-Oriented PHP.
- Design made using Bootstrap 4.
- Entirely W3C valid.
- All SQL queries are written using PDO and are merged in an unique class (see /models/Db.class.php).
- Every entity from the SQL database can and is represented by a dedicated object (kind of Object-Relational Mapping). 
- There is no JavaScript used at the moment since we haven't seen it in class, but I'm working on it on my free time.