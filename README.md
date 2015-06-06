# twitter_notifications
This script is made for the "Today Scripts" OS X widget by SamRothCA. It shows you your last 5 twitter notifications.

[Get the Today Scripts widget for OS X](https://github.com/SamRothCA/Today-Scripts)

# Usage
1. Set your Twitter name and password in the login.php file
2. Open your Terminal, move to the twitter_notifications directory `cd path/to/twitter_notifications`
3. Run the login.php file to get a session in the cookiejar.txt file. `php -f login.php`. 
4. Check if the session has been saved in the cookiejar.txt file. If it's still empty, you'll have to edit the file permissions (chmod) to 7777 and do step #3 again.
5. Set up the script from the OS X Today Scripts widget:
```
cd path/to/twitter_notifications
php -f activity.php
```
6. Check the "Run automatically" option and you're good to go!