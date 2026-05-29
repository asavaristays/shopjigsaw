# Rapturous Jigsaw WooCommerce Shop Backup

Snapshot of https://shop.rapturousjigsaw.com exported on 20260528-183452.

## Contents

- `wordpress/` - WordPress filesystem from the Docker volume.
- `database/shopjigsaw-20260528-183452.sql` - MariaDB/WooCommerce database export with drop-table statements.
- `deploy/docker-compose.yml` - Docker Compose structure used on the VPS.
- `deploy/.env.example` - placeholder environment variables. Real secrets are intentionally not committed.
- `deploy/rj_*.json` - product/catalog import support files currently stored on the VPS.

## Restore Notes

1. Copy `deploy/.env.example` to `deploy/.env` and fill secure passwords.
2. Start the Docker stack from `deploy/docker-compose.yml`.
3. Copy `wordpress/` into the WordPress volume.
4. Import the SQL file into MariaDB.
5. Update site URLs if restoring to a different domain.

## Security

Secrets and credentials are excluded from this repository. Do not commit `.env`, live credentials, payment keys, or `wp-config.php`.
