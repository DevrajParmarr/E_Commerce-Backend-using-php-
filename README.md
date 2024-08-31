Description
This project is an e-commerce platform developed with the guidance of Kalidas Sir from Acmegrade. The platform features multiple user roles, including Super Admin, Vendor, and Customer, each with specific functionalities. The system supports user authentication, product management, order processing, and cart management.

Features
Super Admin
Maintain Website: Basic maintenance and updates of the website.
Release New Features/Updates: Manage the release of new features and updates.
Manage Users: Manage user accounts and permissions.
Vendor
Authentication

Signup

UI: Includes fields for username, password, confirm password, and user type.
   Process: Verifies if both passwords match; otherwise, throws an error.
   API:
      Reads user info.
      Connects to the database.
      Inserts user details into the database.
  Database:
     userid - INT, AUTO_INCREMENT
     username - VARCHAR(20), UNIQUE
     password - VARCHAR(100)
     usertype - VARCHAR(15)
     createddate - TIMESTAMP, default CURRENT_TIMESTAMP
     active_status - BOOLEAN, default 1

Login

   UI: Fields for username and password.
   API:
     Receives login credentials.
     Connects to the database.
     Checks for credential match in the database.
     Logs in if credentials match; otherwise, login fails.
     Database: Optional login activity logger.

Manage Products:

    Add: Add new products.
   View: View existing products.
   Edit: Edit product details.
   Delete: Remove products.
  
Manage Orders:

   View and manage orders.
   View Analytics: Optional feature to view product and sales analytics.

  Customer
     Authentication:

     Signup and login functionality.
     View Products: View available products.
     
Manage Cart

Add: Add products to the cart.
View: View cart contents.
Edit: Modify cart items.
Delete: Remove items from the cart.
Place Order:

Place orders for products in the cart.
