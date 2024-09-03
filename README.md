

---

# E-Commerce Website with Backend in PHP

## Setup Instructions

### Prerequisites
- **XAMPP**: Download and install from [XAMPP Official Website](https://www.apachefriends.org/index.html).

### Steps to Run the Project

1. **Install XAMPP**:
   - Download and install XAMPP on your system.

2. **Start Apache and MySQL Servers**:
   - Open the XAMPP Control Panel.
   - Click **Start** next to **Apache** and **MySQL**.

3. **Set Up Project Files**:
   - Copy the project folder to the `htdocs` directory:
     ```
     C:\xampp\htdocs\E-COMMERCE-WEBSITE
     ```

4. **Configure the Database**:
   - Open `http://localhost/phpmyadmin/` in your browser.
   - Create a new database.
   - Import the SQL file from the project folder.

5. **Configure the Project**:
   - Open the project’s configuration file (e.g., `config.php`).
   - Update the database settings:
     ```php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "acme";
     ```

6. **Run the Project**:
   - Open your browser and navigate to:
     ```
     http://localhost/E-COMMERCE-WEBSITE/
     ```

### Troubleshooting
- **Ports in Use**: Ensure ports 80 (Apache) and 3306 (MySQL) are not in use by other applications.
- **Database Configuration**: Verify that your database credentials in the config file are correct.

## Overview

This project is a web application designed to manage e-commerce activities, including user management, product management, and order processing. The platform supports three types of users: **Super Admin**, **Vendor**, and **Customer**, each with specific functionalities.

## Features

### Super Admin
- **Maintain Website**: Perform basic maintenance and updates.
- **Release New Features/Updates**: Manage the rollout of new features.
- **Manage Users**: Oversee user accounts and permissions.

### Vendor
- **Authentication**:
  - **Signup**:
    - **UI**: Fields for username, password, confirm password, and user type.
    - **Process**: Verifies password match; inserts user details into the database.
    - **Database Schema**:
      - `userid`: INT, AUTO_INCREMENT
      - `username`: VARCHAR(20), UNIQUE
      - `password`: VARCHAR(100)
      - `usertype`: VARCHAR(15)
      - `createddate`: TIMESTAMP, default CURRENT_TIMESTAMP
      - `active_status`: BOOLEAN, default 1
  - **Login**:
    - **UI**: Fields for username and password.
    - **Process**: Verifies credentials against the database.
    - **Database**: Optional login activity logging.

- **Manage Products**:
  - **Add**: Introduce new products.
  - **View**: Display existing products.
  - **Edit**: Modify product details.
  - **Delete**: Remove products from the catalog.

- **Manage Orders**:
  - **View and Manage**: Handle orders and monitor their status.
  - **Analytics**: Optionally view product and sales analytics.

### Customer
- **Authentication**:
  - **Signup and Login**: Register and access the platform.
- **View Products**: Browse available products.

- **Manage Cart**:
  - **Add**: Include products in the cart.
  - **View**: Review cart contents.
  - **Edit**: Adjust items in the cart.
  - **Delete**: Remove items from the cart.

- **Place Order**: Finalize orders for products in the cart.

--- 

This structured format will help users understand how to set up and use your project efficiently.
