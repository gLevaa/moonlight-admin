# moonlight-admin
### Created March, 2018. 
Easy to use admin panel, designed for cheat loaders.

# Explanation
An admin panel to be used wtih the `overseas-loader` repository located on my profile.

This panel simply consists of a page to log in, ban/unban and add users to the access to the cheat. The two scripts in `loader/` are used for the cheat loader.

`checks.php` receives a GET request from the `overseas-loader` with a username, password and string generated using hardware serial numbers and specifications. These values are then checked against the database. If the login is successful and from the correct computer (as identified by hardware information), a token will be generated and stored in the database with a two minute expiry. This token is returned to the loader.

A second request is made to download from the `download.php` with the username and token as GET paramaters. If the token has been activated within two minutes and the username corresponds to this token, then the download will begin. Re-authentication is not needed as the token is return as a result of a valid login.

## checks.php returns.
<ul>
  <li>202 - User doesn't exist.</li>
  <li>203 - Incorrect password.</li>
  <li>204 - Incorrect hardware ID.</li>
  <li>205:token - Valid first time login : token.</li>
  <li>206:token - Valid login : token.</li>
</ul>

## downloads.php returns.
<ul>
  <li>2hu1ij123b - User doesn't exist or token wasn't generated properly.</li>
  <li>2oj32ih312b3md - Expired token.</li>
  <li>9eriuasd2u - Couldn't find the file to download.</li>
</ul>

## Basic setup instructions.
<ol>
  <li>Upload the moonlight directory onto your site.</li>
  <li>Import the SQL file in the `/sql` directory.</li>
  <li>Create a SQL user and add it to the database with the correct privileges.</li>
  <li>Alter connection.php according to the comments.</li>
  <li>Replace checks.php on line 52 of download.php with the path to your DLL/Dylib/Injector&Dylib/DLL</li>
  <li>To create the admin account, you will need to create a login using the hashing techniques found in the add user script, then set the status to `admin`</li>
</ol>

# Credits
Coinhive for the CSS
  
