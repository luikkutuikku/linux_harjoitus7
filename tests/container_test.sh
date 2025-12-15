#!/usr/bin/env bash
set -euo pipefail

IMAGE="${1:-cicd-app:test}"

docker build -t "$IMAGE" .
docker run --rm "$IMAGE" php -l /var/www/html/public/index.php
echo "OK: PHP syntax check passed"
