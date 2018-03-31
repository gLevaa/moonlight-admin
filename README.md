# moonlight-admin
Easy to use admin panel, designed for cheat loaders.

# Uses
So, this is an admin panel I was designing to be used with a CS:GO cheat loader made in native C++, but gave up on that and just open sourced the panel. 

This panel is just a page to log in, checks for admin status, then grants access to the admin panel. This panel is able to add users, ban users and also comes included with the scripts needed for a loader. The two scripts, `checks.php` and `download.php` in the loader directory are what the cheat loader would use. `checks.php` is sent a GET request from the loader with a username, password, and hardware identifier (check the script for exact GET values). Then, the script will check these values from the request and return a string to be read by the cheat loader. If the HWID is correct, password etc. the script will generate a token stored in the `tokens` table a long with a date 2 minutes from the generation time. Then, when you want to download the DLL to inject into the game, you make a request like this (assuming you're using C#)

`
// Set the URL of the download script
string url = "http://***.com/loader/download.php";

// Create the WebClient object
WebClient client = new WebClient();

// These are hear if you want event handlers for these things, comment out or delete if not
client.DownloadFileCompleted += new AsyncCompletedEventHandler(client_DownloadFileCompleted);
client.DownloadProgressChanged += new DownloadProgressChangedEventHandler(ProgressChanged);

// Download the file to your given directory
client.DownloadFileAsync(new Uri(url), @"c:/temp/");
`

## Returns

<ul>
  <li>`2oia92n` - Either the user doesn't exist or the </li>
