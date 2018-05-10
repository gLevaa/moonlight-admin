# moonlight-admin
Easy to use admin panel, designed for cheat loaders.

# Uses
So, this is an admin panel I was designing to be used with a CS:GO cheat loader made in native C++, but gave up on that and just open sourced the panel. 

This panel is just a page to log in, checks for admin status, then grants access to the admin panel. This panel is able to add users, ban users and also comes included with the scripts needed for a loader. The two scripts, `checks.php` and `download.php` in the loader directory are what the cheat loader would use.

`checks.php` is sent a GET request from the loader with a username, password, and hardware identifier (check the script for exact GET values). Then, the script will check these values from the request and return a string to be read by the cheat loader. If the HWID is correct, password etc. the script will generate a token stored in the `tokens` table a long with a date 2 minutes from the generation time. Then, when you want to download the DLL to inject into the game, you make a request like this (assuming you're using C#)

```
// Set the URL of the download script
string url = "http://***.com/loader/download.php";

// Create the WebClient object
WebClient client = new WebClient();

// These are here if you want event handlers for these things, comment out or delete if not
client.DownloadFileCompleted += new AsyncCompletedEventHandler(client_DownloadFileCompleted);
client.DownloadProgressChanged += new DownloadProgressChangedEventHandler(ProgressChanged);

// Download the file to your given directory
client.DownloadFileAsync(new Uri(url), @"c:/temp/");
```

Also, keep in mind when using this you <b>do not</b> need to set the HWID or IP. These will auto-set on first request to checks.php

## Returns for checks.php
<ul>
  <li>202 - User doesn't exist</li>
  <li>203 - Incorrect password</li>
  <li>204 - Incorrect HWID</li>
  <li>205:*20 char token* - First login, HWID & IP set. The 20 char key after :: is the token. Seperate the string up and save the token in the loader.</li>
  <li>206:*20 char token* - All was correct. The 20 char key after :: is the token. Seperate the string up and save the token in the loader.</li>
</ul>

## Returns for downloads.php
<ul>
  <li>2hu1ij123b - User doesn't exist or token wasn't gen'd properly</li>
  <li>2oj32ih312b3md - Expired token</li>
  <li>9eriuasd2u - Couldn't find the file to download</li>
</ul>

## Setup
I'm not going to spoonfeed you with this. So I'll keep it short and simple.

<ol>
  <li>Get the moonlight dir onto your site</li>
  <li>Use the SQL file in /sql/ to setup your database</li>
  <li>Create a SQL user and add it to your database with all privellages</li>
  <li>Change information in connection.php to what the comments say</li>
  <li>Replace checks.php on line 52 of download.php with the path to your DLL/Dylib/Injector&Dylib/DLL</li>
  <li>To create a user, insert one manually through PHPMyAdmin, just recreate the add.scr.php script's techniques of hashing the password, set your status to 'admin', hwid to 'not set', and salt to the one you used to hash the password. 
</ol>

# Credits
Coinhive for the CSS
  
