#Lean

Lean is a small wordpress-project-theme.
It´s intended for usage with codekit (dependancies and minification/concatenation). Setting up a gruntfile shouldn´t be too hard though.

What it does:

- reduce number of templates
- use wordpress as intended
- take all theme-related features from "functionality plugin" and put it into the according include-files loaded by functions.php
- allow usage of wordpress-like template loading as well as "hardcoded" templates (ie no content-cpt.php)
- simple wordpress setup
- use best practices from h5bp, bootstrap and friends as much as possible
- load minified assets (install via bower, process via codekit/grunt)
- uses jQuery 2 and Bootstrap 3 (downgrade jQuery to 1.x for older browsers, shims for IE8 already included)
- favicon included yay
- minimal markup for a lean start


##Defaults

###/inludes/

All these files are loaded by functions.php

####theme-setup.php

- registers **menus** (primary and secondary) and widgets
- **image resizing**: BFI_Thumbs available for usage in template files
- load **asset files**: js/scripts.min.js (all js) at the bottom, js/modernizr.min.js in head and css/styles.css in head
- **remove comments** from wp_header() and wp_footer()
- **various filters** (title, excerpt, attachement-links, ...)
- **remove some wordpress stuff** (feed-links, wp-generator, ...) not activated by default
- **bootstrap navbar** with https://github.com/twittem/wp-bootstrap-navwalker

####admin-setup.php

- show template in admin-bar
- beef up admin (dividers, smaller text)
- add Role Editor-in-Chief (author + permissions for Appearance)