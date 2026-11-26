# Render deployment

This project can be built remotely by Render from the Dockerfile; Docker does not need to be installed on your computer. The service is configured to serve Laravel's `public` directory, build Vite assets, and run without a database for the current review site.

The Docker image uses PHP 8.4 because the committed Composer lock file includes Symfony 8.1 packages that require PHP 8.4.1 or later. The project's `composer.json` allows PHP 8.4.

## Before deploying

- Push the project to the GitHub branch you want Render to deploy.
- In Render, create a **Web Service** connected to `kaggwetarzanmark/ihunde`.
- Select branch `main`, runtime **Docker**, and set **Root Directory** to `laravel-app`. Render will use `laravel-app/Dockerfile`; leave custom build and start commands empty.
- Set health check path to `/up`.
- Use the **Free** instance type if you want to review the site without a paid service.

Render should build the image from the repository. No migrations or application setup scripts run during the build. In particular, do not use `composer run setup` for this deployment; that script runs database migrations.

## Environment variables

Add these in the Render service's **Environment** settings:

| Variable | Value |
| --- | --- |
| `APP_KEY` | Required. Generate securely as described below. |
| `APP_URL` | Required. The service's public HTTPS URL, for example `https://ihunde-review.onrender.com`. |

The Docker image already sets these production defaults:

| Variable | Image default | Purpose |
| --- | --- | --- |
| `APP_ENV` | `production` | Enables Laravel production behavior. |
| `APP_DEBUG` | `false` | Prevents detailed exception output to visitors. |
| `LOG_CHANNEL` | `stderr` | Sends application logs to Render's logs. |
| `LOG_LEVEL` | `info` | Keeps routine debug output out of production logs. |
| `SESSION_DRIVER` | `file` | Avoids database-backed sessions. |
| `SESSION_SECURE_COOKIE` | `true` | Sends session cookies only over HTTPS. |
| `CACHE_STORE` | `file` | Avoids database-backed cache. |
| `QUEUE_CONNECTION` | `sync` | Avoids database-backed queues. |
| `APP_MAINTENANCE_DRIVER` | `file` | Avoids database-backed maintenance mode. |
| `FILESYSTEM_DISK` | `local` | Uses Laravel's local disk for temporary files. |
| `TRUSTED_PROXIES` | `REMOTE_ADDR` | Honors Render's forwarded HTTPS scheme and port. |
| `PORT` | `10000` fallback | Render supplies the port for the running service; Apache binds to it. |

Do not set `APP_DEBUG=true` or add credentials to the Dockerfile. Keep keys and credentials in Render's environment settings.

### Generate `APP_KEY`

From `laravel-app`, run:

```powershell
php artisan key:generate --show
```

Copy the one-time output (including its `base64:` prefix) directly into Render's `APP_KEY` setting. Do not paste it into source files, this guide, or a commit. Keep the same key across normal redeploys; changing it invalidates encrypted cookies and sessions.

## Deploy and monitor

1. Save the environment settings and create the service. Render will build the Docker image remotely and start it.
2. Open the service's **Events** and **Logs** tabs to follow the build, startup, and Laravel/Apache output.
3. Visit the service's `onrender.com` URL and confirm the homepage loads. The `/up` health endpoint should return a successful response.
4. In the service's settings, enable **Auto-Deploy** from GitHub to deploy new commits on the selected branch. A failed build or health check is visible in Events and Logs.

Free web services can spin down when idle, so the first visit after inactivity may take longer. The container filesystem is ephemeral: file sessions, cache, logs, and any local uploads can be lost when the service restarts or redeploys. This is suitable for a frontend review, not durable booking or customer data.

## Database and current feature scope

The current public pages and booking/newsletter forms do not read or write a database. The forms explicitly say that booking availability and newsletter subscriptions are not connected, and they do not claim to have saved anything. Laravel's standard user, cache, and queue migrations are present, but no Filament dependency, Filament routes, or application database-backed admin features were found in this repository. No database is required to serve the current site.

The image includes `pdo_mysql` for a later MySQL connection. The app's existing MySQL configuration remains in place; SQLite is not configured as a hosted persistence solution. When a reachable MySQL database is available:

1. Add `DB_CONNECTION=mysql`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` in Render's environment settings. Store the password as a secret.
2. Deploy and verify the connection details.
3. Back up the database as appropriate, then run `php artisan migrate --force` deliberately from a one-off Render Shell session. Migrations are not run at image build or service startup.
4. If sessions or cache need to survive restarts or scale to multiple instances, configure durable shared services for them rather than relying on the container filesystem.

## Items to confirm

Filament is not in the checked-in Composer dependency graph, and no Filament/admin routes were found. This deployment preserves the repository as it exists, but it cannot provide Filament functionality that is absent from this branch. If you expect an admin panel, confirm that its code and dependencies are in the branch connected to Render before relying on it.
