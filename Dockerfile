# Usando a imagem oficial do PHP com Apache
FROM php:8.3-apache

# Instalando dependências do sistema
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Habilitando mod_rewrite do Apache (necessário para Laravel)
RUN a2enmod rewrite

# Definindo o diretório de trabalho
WORKDIR /var/www/html

# Copiando o código da aplicação para o contêiner
COPY ./backend /var/www/html

# Instalando o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalando as dependências do Composer
RUN composer install --no-dev --optimize-autoloader

# Expondo a porta 80
EXPOSE 80

# Comando para iniciar o Apache
CMD ["apache2-foreground"]
