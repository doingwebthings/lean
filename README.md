#Lean

Lean is a small wordpress-project-theme.

What it does:

- simple wordpress setup
- use best practices from h5bp, bootstrap and friends as much as possible
- **favicon** included yay
- minimal markup for a lean start
- take all theme-related features from "functionality plugin" and put it into the according include-files loaded by functions.php. This might be considered a bad practice but it does a good job for me.
- load minified assets
- uses **jQuery 1.11** and **Bootstrap 3** (shims for IE8 already included)
- Grunt handles image-optimization, compiles the less files and uglifies javascript

##To-Do

- Wordpress: Improve default emails (change from, html, ...)
- Grunt: create image-sprites (and svg-sprites)
- move to jQuery 2 sometime


##Defaults

### Files in /inludes/

All these files are loaded by functions.php.

####admin-setup.php

- show template in admin-bar
- beef up admin (dividers, smaller text)
- add Role Editor-in-Chief (author + permissions for Appearance)

####cpt-loader.php

- simply includes files from includes/custom-post-types/
- all definition for CPTs goes into separate files (products.php, jobs.php)

####mail-setup.php

Customize emails here.

- does nothing yet

####shortcodes.php

A file to add shortcodes.

- does nothing yet

####template-tags.php

A file for helper functions used in template files.

####theme-setup.php

- registers **menus** (primary and secondary) and **widgets**
- load **asset files**: js/scripts.min.js (all js) at the bottom, js/modernizr.min.js in head and css/styles.css in head
- **remove comments** from wp_header() and wp_footer()
- **various filters** (title, excerpt, attachement-links, ...)
- **remove some wordpress stuff** (feed-links, wp-generator, ...) not activated by default
- **bootstrap navbar** with https://github.com/twittem/wp-bootstrap-navwalker
- **image resizing**: BFI_Thumbs available for usage in template files

##To-Do

- use more semantic markup (and CSS-classes) suitable for blogs AND portfolio-sites