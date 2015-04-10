# Feedbin starred articles

This repository contains a set of scripts to backup all your starred articles from [Feedbin](https://feedbin.com/) to a MySQL database. Code has been tested with Apache/2.2.26 , PHP v.5.4.30 and MySQL v5.6.20

First, head to the Feedbin [settings page](https://feedbin.com/settings/import_export). In the 'Export' -section, click `Export` next to 'Starred Articles'. Feedbin will return a notification:  _"Starred export has begun. You will receive an email with the download link shortly”_.

Next, check your inbox for an email with subject: _"[Feedbin] Starred Items Export Complete”_ . The email contains a download link, which allows you to save the starred articles in a `.JSON` file.

- Download and copy the content of this repository to the DocumentRoot of your webserver. 
- Store the `starred.json` -file in the data/ directory.



##### Setup of the MySQL database:

- Edit `db_create.php` in the include/ directory, change “*username*”  and “*password*” if required.
  
- Launch `db_create.php` from your browser (via [http://localhost/include/db_create.php](http://localhost/include/db_create.php) )
  
  to create the database and table structure
  
- Edit `db_connect.php` in the include/ directory, change “*username*” , “*password*” if required.
  



##### Load the JSON data:

Direct your browser to [http://localhost/data/import.php](http://localhost/data/import.php)

This will parse the `starred.json` -file and insert the data into the database. Now direct your browser to  [http://localhost](http://localhost), this will display all entries found in the database. 

**Note:** the layout is built with [Bootstrap](http://getbootstrap.com) and uses the [Font Awesome](http://fortawesome.github.io/Font-Awesome/) toolkit.



### Fetch XML feed:

Complementary to the (initial) upload of starred articles in `.JSON` format, you can fetch additional starred articles through the XML feed.

First, head to the main Feedbin [settings page](https://feedbin.com/settings) and at the bottom of the page activate the _"Enable starred article feed"_ -option and copy the URL  (eg. https://feedbin.com/starred/THSYv5sdrKKOP92eQluQAQ.xml )

- Edit `feed.php` and include your own XML feed URL
- Change database “*username*” and “*password*” if required



`feed.php` works similar to the upload of the `.JSON` file. It reads the content of the URL feed and writes the (new) entries to the database. You can run `feed.php` as a cron job to get frequent updates.