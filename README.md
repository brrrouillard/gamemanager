# Game Manager
A Game Manager website written in PHP using MVC architecture. 

## Getting Started

### Prerequisites
Any PHP development environment. I used MAMP but anything else should work.

### Installing and running
The only thing to be aware of is to change the MySQL login informations (*see /models/Db.class.php **line 10** *).

## Purpose
I started to build this website as a personal project to practice my abilities in PHP, using the MVC architecture as we saw in class.
In addition to PHP, I used it to practice my HTML and CSS fundamentals. It also made me use Bootstrap for the first time.
I plan to add some JavaScript (and jQuery) after finishing implemanting the fundamentals of the website.

## Features
- Register and login.
- Manage a list of video-games. Sort them by name, editor or release date.
- Add your own games to the list.
- Chat with other users in semi-realtime (refresh needed to show new messages).

## To Do
- Implement a page to let user modify his informations.
- Implement a way to let a user establish and manage his own games collection.
- Implement an admin panel (users and games management).
- Let people vote for their favorite games and show results next to them.
- Rewrite the code to make it fully English-written.
- Check security issues (SQL injections, XSS).
- Add some JavaScript and jQuery.

## Technical overview
- Built using Object-Oriented vanilla PHP and a Model-View-Controller architecture.
- Design made using Bootstrap 4.
- Entirely W3C valid.
- All SQL queries are written using PDO and are grouped in an unique class (*see /models/Db.class.php*).
- Every entity from the SQL database can and is represented by a dedicated object (kind of Object-Relational Mapping). 
- There is no JavaScript used at the moment since we haven't seen it in class, but I'm working on it on my free time.