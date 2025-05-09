# Subscribe-Page Update Notes

## DeepSeek

*Output 01*
Regarding htaccess

```
1. Recommended .htaccess Structure
In public_html/.htaccess (Root)
apache

<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /
RewriteRule ^index\.php$ - [L]

# ALLOW REST API REQUESTS
RewriteCond %{REQUEST_URI} ^/wp-json/custom/v1/ [NC]
RewriteRule ^ - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization},L]

# STANDARD WORDPRESS RULES
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]

# BLOCK DIRECT PHP ACCESS (except REST)
<Files *.php>
    Order allow,deny
    Deny from all
    <IfModule mod_headers.c>
        SetEnvIf Request_URI "^/wp-json/" allow
        Order allow,deny
        Allow from env=allow
    </IfModule>
</Files>
</IfModule>

In wp-content/.htaccess (Optional - only if needed)
apache

# DISALLOW DIRECT ACCESS TO PLUGINS/THEMES
Order deny,allow
Deny from all

# ALLOW REST API CALLS
<Files "rest-api.php">
    Allow from all
</Files>

2. Critical Verification Steps

    Check File Permissions:
    bash

chmod 644 public_html/.htaccess
chmod 644 wp-content/.htaccess

Test Endpoint Accessibility:
bash

# Test GET
curl -I "https://yoursite.com/wp-json/custom/v1/endpoint/"

# Test POST
curl -X POST "https://yoursite.com/wp-json/custom/v1/endpoint/" \
  -H "Content-Type: application/json" \
  -d '{"test":"data"}'

Debugging Tools:

    Add to wp-config.php:
    php

        define('WP_DEBUG', true);
        define('WP_REST_DEBUG', true);

3. Common Pitfalls & Fixes
Symptom	Solution
403 Forbidden	Remove redundant deny rules in wp-content/.htaccess
404 Not Found	Ensure index.php isn't missing rewrite rules
POST blocked	Add [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]
CORS issues	Add header rules for OPTIONS method
4. Production Security Checklist

    Restrict by IP (if possible):
    apache

<Files "debug.log">
    Order allow,deny
    Deny from all
    Allow from 192.168.0.1
</Files>

Rate Limiting (prevent abuse):
apache

    <IfModule mod_rewrite.c>
    RewriteCond %{REQUEST_URI} ^/wp-json/custom/v1/endpoint/
    RewriteCond %{REQUEST_METHOD} POST
    RewriteCond %{REMOTE_ADDR} !^123\.456\.789\.012
    RewriteRule .* - [F,L]
    </IfModule>

5. Final Recommendation

    Consolidate rules into public_html/.htaccess

    Remove redundant rules from wp-content/.htaccess

    Test incrementally after each change
```