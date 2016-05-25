#Keywords, Charset & Length


Plugin for [YOURLS](http://yourls.org)

##Description

Based off ozh, giveforward and LudoBoggio's work. Credit where credit is due. I'm not an artist, just a guy with a glue gun!

Overrides default behavior allowing: a custom charset, custom link length and links are random. 
Does *not* use the sequential incrementing (starts out with a fixed length like ozh)
It does not mess with existing links or custom links, only new, randomly generated links.
Link length and character set are user-controlled via the admin interface.

##Installation
1. In `/user/plugins`, create a new folder named `key_char_len`
2. Drop these files in that directory.
3. Go to the Plugins administration page ( *eg* `http://sho.rt/admin/plugins.php` ) and activate the plugin.
4. Go to the new administration page ( *eg* `http://sho.rt/admin/plugins.php?page=key_char_len` ) to configure
5. Have fun!

![AdminPage](http://berb.ec/uploads/yourls-kcl.png)

##License
YOURLS' license, aka *"Do whatever the hell you want with it"*.
