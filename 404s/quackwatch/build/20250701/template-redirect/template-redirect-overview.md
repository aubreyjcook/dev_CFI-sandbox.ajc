# Template-Redirect Overview

## Overview

Template redirects are a feature inside wp. They are applicable to resolving 404s on the quackwatch wesbite. Documentation is found here: https://developer.wordpress.org/reference/hooks/template_redirect/

Template redirects are written in php and are applied in the functions.php file of the theme. They are used to redirect a 404 page to a custom page. This is useful for creating custom 404 pages that are more user friendly than the default 404 page.

They modify files in the wp-content directory and are therefore safe to use without affecting the core files of the WP instance.