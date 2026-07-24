# civentral-web

1111-ADMIN-2011
password123





# ==============================================================================
# 1. DIRECTORY INDEX & CORE SETTINGS
# ==============================================================================
DirectoryIndex home.php index.html index.php

# Disable Directory Browsing
Options -Indexes

# Disable Server Signature (Hides Apache version on error pages)
ServerSignature Off

# ==============================================================================
# 2. REWRITE ENGINE, HTTPS & URL CLEANUP
# ==============================================================================
RewriteEngine On

# Force HTTPS (Skipped on localhost due to your existing rules)
RewriteCond %{HTTPS} off
RewriteCond %{HTTP_HOST} !=localhost
RewriteCond %{HTTP_HOST} !=127.0.0.1
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

# Route /c/{anything} to dashboard.php
RewriteRule ^c/([a-zA-Z0-9-]+)/?$ dashboard.php?id=$1 [L,QSA]

# !!! REMOVED THE .PHP REDIRECT RULE THAT WAS RELOADING THE PAGE !!!

# Remove .php extension internally (e.g., /about loads about.php)
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^([^\.]+)$ $1.php [NC,L]

# ==============================================================================
# 3. SECURITY HEADERS (Safe - won't crash if mod_headers is missing)
# ==============================================================================
<IfModule mod_headers.c>
    Header always set X-Frame-Options "SAMEORIGIN"
    Header always set X-Content-Type-Options "nosniff"
    Header always set X-XSS-Protection "1; mode=block"
    Header always set Referrer-Policy "strict-origin-when-cross-origin"
    # HSTS is disabled here for localhost testing to prevent locking you out
    # Header always set Strict-Transport-Security "max-age=31536000; includeSubDomains" env=HTTPS
</IfModule>

# ==============================================================================
# 4. BLOCK SENSITIVE FILES & MALICIOUS TRAFFIC
# ==============================================================================
<FilesMatch "^\.|\.(bak|config|sql|fla|md|ini|log|sh|inc|swp|dist|env|git|svn|xml|txt)$">
    Order allow,deny
    Deny from all
</FilesMatch>

# Block Bad Bots
RewriteCond %{HTTP_USER_AGENT} ^BadBot [OR]
RewriteCond %{HTTP_USER_AGENT} ^ScrapingBot [OR]
RewriteCond %{HTTP_USER_AGENT} ^SemrushBot [OR]
RewriteCond %{HTTP_USER_AGENT} ^AhrefsBot
RewriteRule ^.* - [F,L]

# Block Basic SQL Injection / Script Injections in URLs
RewriteCond %{QUERY_STRING} (<|%3C).*script.*(>|%3E) [NC,OR]
RewriteCond %{QUERY_STRING} UNION.*SELECT [NC,OR]
RewriteCond %{QUERY_STRING} (base64_encode|eval\() [NC,OR]
RewriteCond %{QUERY_STRING} ../../ [NC]
RewriteRule ^ - [F,L]

# HOTLINKING DISABLED FOR LOCALHOST 
# (Uncomment and change 'localhost' to your live domain when you go live)
# RewriteCond %{HTTP_REFERER} !^$ # RewriteCond %{HTTP_REFERER} !^https?://(www\.)?localhost [NC]
# RewriteRule \.(jpg|jpeg|png|gif|webp|svg)$ - [F,NC]

# ==============================================================================
# 5. PERFORMANCE (Safe - won't crash if modules are missing)
# ==============================================================================
<IfModule mod_deflate.c>
  AddOutputFilterByType DEFLATE text/html text/plain text/xml
  AddOutputFilterByType DEFLATE text/css
  AddOutputFilterByType DEFLATE text/javascript
  AddOutputFilterByType DEFLATE application/javascript
  AddOutputFilterByType DEFLATE application/json
  AddOutputFilterByType DEFLATE application/xml
  AddOutputFilterByType DEFLATE image/svg+xml
</IfModule>

<IfModule mod_expires.c>
  ExpiresActive On
  ExpiresByType image/jpg "access plus 1 year"
  ExpiresByType image/jpeg "access plus 1 year"
  ExpiresByType image/gif "access plus 1 year"
  ExpiresByType image/png "access plus 1 year"
  ExpiresByType image/webp "access plus 1 year"
  ExpiresByType image/svg+xml "access plus 1 year"
  ExpiresByType text/css "access plus 1 month"
  ExpiresByType application/javascript "access plus 1 month"
  ExpiresByType font/woff2 "access plus 1 year"
  ExpiresByType font/woff "access plus 1 year"
</IfModule>