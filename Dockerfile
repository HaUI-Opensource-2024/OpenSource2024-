FROM wordpress:latest   

# Install any required plugins or themes here 
COPY . /var/www/html/wp-content/plugins/

# Ensure the plugins are owned by the www-data user
RUN chown -R www-data:www-data /var/www/html

# Set the default user to www-data
USER www-data

# Set the default working directory
WORKDIR /var/www/html

# Start Apache in the foreground
CMD ["apache2-foreground"]