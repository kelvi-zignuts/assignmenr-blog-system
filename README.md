# Blog system
Brief description of the project.
## Installation
1. **Clone the repository**
   ```bash
   git clone https://github.com/kelvi-zignuts/assignment-blog-system.git
   ```
2. **Navigate into the project directory**
   ```bash
   cd assignment-blog-system
   ```
3. **Install dependencies**
   ```bash
   composer install
   ```
4. **Copy the example environment file**
   ```bash
   cp .env.example .env
   ```
5. **Generate application key**
   ```bash
   php artisan key:generate
   ```
6. **Create a symbolic link from `public/storage` to `storage/app/public`**
   ```bash
   php artisan storage:link
   ```
## Configuration
1. **Database Setup**
   - Create a new database for the project.
   - Update the `.env` file with your database credentials.
2. **Mail Configuration (if applicable)**
   - Update the `.env` file with your mail server credentials.
## Usage
1. **Serve the application**
   ```bash
   php artisan serve
   ```
2. **Access the application**
   Open your web browser and navigate to `http://localhost:8000`.
## Contributing
Contributions are welcome! Please follow these steps:
1. Fork the repository
2. Create a new branch (`git checkout -b develop`)
3. Make your changes
4. Commit your changes (`git commit -am 'Add new feature'`)
5. Push to the branch (`git push origin develop`)
6. Create a new Pull Request
