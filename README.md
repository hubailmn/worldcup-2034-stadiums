# World Cup 2034 Stadiums

A web development group project about the stadiums planned for the 2034 FIFA World Cup in Saudi Arabia.

## Project goals

- Introduce the planned World Cup stadiums and their host cities.
- Present stadium information in an accessible, responsive website.
- Help visitors explore Saudi Arabia's preparations for the tournament.

## Current progress

The project currently contains a starter page served through PHP. Stadium content, styling, and interactive features will be developed as the project progresses.

## Project structure

```text
worldcup-2034-stadiums/
├── public/             # Web server document root
│   ├── index.php       # Homepage and future application entry point
│   └── assets/         # Public CSS, JavaScript, and images
├── src/                # Backend PHP code, outside the document root
└── README.md
```

Keep credentials and private application files outside `public/`. A root-level
`.env` file is ignored by Git; environment loading must be configured when the
backend is implemented. If Composer is introduced, its generated `vendor/`
directory belongs at the project root and is also ignored by Git.

## Getting started

Install PHP 8.3 or newer, clone the repository, and run from the project root:

```bash
php -S 127.0.0.1:8000 -t public
```

Open <http://127.0.0.1:8000>. No dependencies or build step are currently required.
The built-in PHP server is for local development only.

## Production deployment

The live site is <https://worldcup-2034.hubailmn.cc>.

Nginx must serve **only `public/`**, with these settings inside the site's server
block (alongside its HTTPS configuration):

```nginx
root /apps/worldcup-2034-stadiums/public;
index index.php index.html;

location / {
    try_files $uri $uri/ /index.php?$query_string;
}

location ~ /\. {
    deny all;
}

location ~ \.php$ {
    include snippets/fastcgi-php.conf;
    fastcgi_pass unix:/run/php/worldcup-2034.sock;
}
```

The current VPS uses Nginx and PHP 8.3-FPM with a dedicated `worldcup-2034` pool.
Both services start on boot and automatically restart if they exit unexpectedly.
The live Nginx configuration is at
`/etc/nginx/sites-available/worldcup-2034.hubailmn.cc`.

For ordinary PHP and asset updates:

```bash
git -C /apps/worldcup-2034-stadiums pull --ff-only
```

No service restart is needed for ordinary code changes. Future dependencies,
frontend builds, or database migrations may require additional deployment steps.

## Technology

- HTML
- PHP 8.3 with PHP-FPM
- Nginx
- Planned: CSS and JavaScript
