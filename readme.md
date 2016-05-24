#Simple Random Charset


Plugin for [YOURLS](http://yourls.org)

##Description
Allows a simple override for the charset. Does *not* still uses the sequential incrementing
(ie does start this out with a fixed lenght ALA https://github.com/YOURLS/random-keywords). 
It does not mess with existing links created or custom links, only new randomly generated.

I like to use the following as it limits words and confusing l or 1

```
/*
 ** Simple Random Charset
 ** these look similar:         I & l & 1, o & 0, S & 5, Z & 2
 ** so let us remove:           ilosz0125
 */
define('YOURLS_PRB_CHARSET', 'abcdefghjkmnpqrtuvwxy346789');
```

##Installation
1. In `/user/plugins`, create a new folder named `simplerandomcharset`.
2. Drop these files in that directory.
3. Go to the Plugins administration page ( *eg* `http://sho.rt/admin/plugins.php` ) and activate the plugin.
4. Create your charset as a constant YOURLS_PRB_CHARSET in user/config.php
5. Have fun!

##License
YOURLS' license, aka *"Do whatever the hell you want with it"*.
