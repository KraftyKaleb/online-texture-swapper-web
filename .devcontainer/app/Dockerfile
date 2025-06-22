FROM ubuntu:latest

# Install MariaDB client
RUN apt-get update  \
    && apt-get -y install software-properties-common \
    && add-apt-repository ppa:ondrej/php -y \
    && apt-get -y install openssh-server \
    && apt-get -y install mariadb-client \
    && apt-get -y install php8.4 \
    && apt-get -y install php8.4-common \
    && apt-get -y install php8.4-cli \
    && apt-get -y install php8.4-fpm \
    && apt-get -y install php8.4-mysql \
    && apt-get -y install php8.4-xml \
    && apt-get -y install php8.4-curl \
    && apt-get -y install php8.4-mbstring \
    && apt-get -y install php8.4-zip \
    && apt-get -y install php8.4-gd \
    && apt-get -y install php8.4-gmp

# Ensure the PHP-FPM sock directory exists
RUN mkdir -p /var/run/php*

EXPOSE 443
EXPOSE 8000

ENTRYPOINT ["php", "-S", "0.0.0.0:8000", "-t", "/var/www/html/server"]

# [Optional] Uncomment this section to install additional OS packages.
# RUN apt-get update && export DEBIAN_FRONTEND=noninteractive \
#     && apt-get -y install --no-install-recommends <your-package-list-here>

# [Optional] Uncomment this line to install global node packages.
# RUN su vscode -c "source /usr/local/share/nvm/nvm.sh && npm install -g <your-package-here>" 2>&