# moonlight-admin
### Created March, 2018
Easy to use admin panel, designed for cheat loaders.

# Explanation
An admin panel to be used wtih the `overseas-loader` repository located on my profile.

This panel simply consists of a page to log in, ban/unban and add users to the access to the cheat. The two scripts in `loader/` are used for the cheat loader.

`checks.php` receives a GET request from the `overseas-loader` with a username, password and string generated using hardware serial numbers and specifications. These values are then checked against the database. If the login is successful and from the correct computer (as identified by hardware information), a token will be generated and stored in the database with a two minute expiry. This token is returned to the loader.

A second request is made to download from the `download.php` with the username and token as GET paramaters. If the token has been activated within two minutes and the username corresponds to this token, then the download will begin. Re-authentication is not needed as the token is return as a result of a valid login.

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
  
