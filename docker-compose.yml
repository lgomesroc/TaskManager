version: '3.8'
services:
  app:
    build:
      context: .
      dockerfile: Dockerfile
    container_name: laravel_app
    ports:
      - "8080:80"  # Mapeando porta 8080 do host para porta 80 do container
    volumes:
      - ./backend:/var/www/html
      - /var/www/html/vendor  # Preserva a pasta vendor no container
      - /var/www/html/storage/logs  # Preserva os logs no container
    environment:
      - APP_NAME=TaskManager
      - APP_ENV=local
      - APP_DEBUG=true
      - APP_URL=http://localhost:8080
      - DB_CONNECTION=mysql
      - DB_HOST=db
      - DB_PORT=3306
      - DB_DATABASE=taskmanager
      - DB_USERNAME=lgomesroc
      - DB_PASSWORD=12345
      - CACHE_DRIVER=file
      - SESSION_DRIVER=file
      - QUEUE_DRIVER=sync
      - SANCTUM_STATEFUL_DOMAINS=localhost:8080
      - SESSION_DOMAIN=localhost
    networks:
      - app_network
    depends_on:
      - db
    restart: unless-stopped

  db:
    image: mysql:8.0
    container_name: mysql_db
    ports:
      - "3307:3306"
    environment:
      MYSQL_ROOT_PASSWORD: "5577azcD@#"
      MYSQL_DATABASE: taskmanager
      MYSQL_USER: lgomesroc
      MYSQL_PASSWORD: 12345
    volumes:
      - db_data:/var/lib/mysql
      - ./mysql/init:/docker-entrypoint-initdb.d
    networks:
      - app_network
    command: --default-authentication-plugin=mysql_native_password
    restart: unless-stopped

  phpmyadmin:
    image: phpmyadmin/phpmyadmin
    container_name: phpmyadmin
    ports:
      - "8081:80"
    environment:
      - PMA_HOST=db
      - PMA_PORT=3306
      - MYSQL_ROOT_PASSWORD=5577azcD@#
    networks:
      - app_network
    depends_on:
      - db

networks:
  app_network:
    driver: bridge

volumes:
  db_data:
    driver: local