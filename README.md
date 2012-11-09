*Evan's Tests*
================================
Buyer Enquiry: http://yacht-fractions.co.uk/buyer/create
* (FAIL: Email Address) Validates: valid email address, all required fields, terms and conditions checked
* (FAIL: Error message displays twice on share sizes) Validates: only numbers can be entered for: share size min/max, budget min/max, length min/max
* (FAIL) Validates: email is not already used
* (PASS) Budget Min/Max Field: the following input should be accepted: "10000.00", "10 000", "10,000"
* (PASS) Select three yachts which interest you" should be highlighted in Admin->Buyer->Find Yachtshares
* (PASS) Email sent to buyer and admin containing correct information
* (PASS) Email displays fractions instead of decimals for share sizes
* (PASS) Terms and conditions appears at end of form
* (PASS) Conversion of feet to meters (if feet selected)
* (FAIL: Does not save feet/meters dropdown and selected boats of interest, saves everything else though) "Save for later" - check it works on closing the window
* (PASS) "Save for later" - Does not save the terms and conditions check box
* (PASS) After submitting display thank you page with link back to yachtfractions home page
* (PASS) Closing the browser prompts the user "Are you sure..."
* (FAIL) Does NOT prompt "Are you sure..." the user on submit

Seller

Registration: http://yacht-fractions.co.uk/seller/create
* Validates: valid email, matching passwords, all fields required
* Validates: email is not already used
* CHRIS save for later logout, close browser and log back in - did it save?

Creating a Yachtshare

Uploading files for a yachtshare

Admin

Buyer Detail
* (PASS) Do not show unecessary fields (i.e. "Select Yachtshare of Interest" displays names and not ID numbers)
* (FAIL) Do not show terms and conditions field
*CHRIS - are pcitures listed and available with existing shares?



*Evan's Todo*
================================
Added 05/11/12
* ~~Find way to have yachtshare->location and buyer->location fields have the same options~~ (Completed 07/11/12 - 22:30)
* ~~formfield->dropdown->change order should open a new window~~ (Completed 06/11/12 - 16:00)

Added 04/11/12:
* ~~Formfields can have data which will "expire" at a certain date, show expiring data in sidebar of admin panel~~ (Completed 06/11/12 - 13:00)

Tasks (from Skype convo on 29/10/2012):
* ~~yachtshare/create: validate share size screws up that formrow~~ (Completed 31/10/12 - 10:15)
* ~~file/yachtshare/X: set dropdown to "Any" by default then validate something is selected~~ (Completed 31/10/12 - 12:45)
* ~~append file type (i.e. "_public_header") to file name~~ (Completed 31/10/12 - 18:30)
* ~~make "Logout" link on public pages more prominent~~ (Completed 02/11/12 - 11:30)
* ~~buyer/create: selected boats should give name and not just ID's (also in email templates)~~ (Completed 02/11/12 - 12:00)
* ~~actionstep/create: should have buttons "Introduce" and "Introduce with email"~~ (Completed 02/11/12 - 12:20)
* ~~yachtshare/edit and buyer/edit: show html descriptions~~ (Completed 02/11/12 -  12:30)
* mobile export: does not link telephone numbers
* image upload: php memory_limit???
* ~~have config file for email address in emailnew controller~~ (Completed 04/11/12 12:00) (NOTE: configure email in fuel/app/config/offline.php)
* Errors in production mode send email?

Older tasks:
* HTML scrape inactive boats from http://www.yachtfractions.co.uk/fracadmin.asp
* ~~"Save for later" saves on logout~~ (Completed 04/11/12 12:45)
* ~~Jquery interface for change order of formfields~~ (Completed 04/11/12 12:30)
* ~~Fix dropdowns going off screen problem~~ (Completed 31/10/12 - 12:45)
* ~~Validate dropdowns in buyer/create, yachtshare/create,actionstep/create`~~ (Completed 04/11/12 12:00)



*Installation (by Evan)*
================================

1.  Download the zip from https://github.com/evanrolfe/test

2.  Extract to the web root directory

3.  Open /.htaccess (in the application root) and change line num 4 from:

    ```RewriteBase /yacht/public```

	 replace /yacht/ with the name of the directory containing the app. i.e. if the app is located in /home/evan/www/yacht_fractions then .htaccess should contain:

	```RewriteBase /yacht_fractions/public```

4.  Open /fuel/app/config/config.php update line 26, do not forget the trailing slash!!!

    ```'base_url'  => 'http://localhost/yacht/',```

5.  Open /fuel/app/config/production/db.php according to the DB (straightforward).

    NOTE: the site is in production mode by default, should you switch to development mode then you will need to update /fuel/app/config/development/db.php as well.

6.  Optional: to set to offline mode, update /fuel/app/config/offline.php

7.  Now enter phpmyadmin, click on the corresponding database in the sidepanel, click on the "Import" tab, then import the SQL file located at /database_install.sql (in root dir)

8.  Go to http://yourdomain.com/your_yacht_folder/install/admin to create an admin user

9.  IMPORTANT: delete the file located at: /fuel/app/classes/controller/install.phpmyadmin

10. Should you need to change development/production mode it can be done by changing the one line in: fuel/app/bootstrap.php
FINISHED!

*Trouble Shooting*
================================
*  Session errors occuring in offline mode: change line num 33 in /fuel/app/config/session.php from ```'driver'			=> 'db',``` to ```'driver'			=> 'cookie',```

*  Uploads not working due to PHP missing fileinfo extensions: add the following line to php.ini ```extension=fileinfo.so```

*  If you get a permission denied error pertaining to the logs then a probable solution will be to set the permissions of /fuel/app/logs directory to writable by the web server's user account. i.e. in linux run command: ```chmod -R 777 fuel/app/logs/*```
