# Build arguments
ARG BUILD_MODE

# Image
FROM ${BUILD_MODE}/base:latest

# Update dependencies
RUN apt-get update \
# Install Crontab
    && apt-get install -y cron \
# Clean up the apt cache
    && rm -rf /var/lib/apt/lists/*

# Copy and enable cron job file
COPY ./cron.d/crontab /etc/cron.d/crontab
RUN crontab /etc/cron.d/crontab

# Set up the working directory
WORKDIR /var/www/html

# Run the cron service
CMD ["cron", "-f"]
