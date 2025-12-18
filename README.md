# ABK Store 

ABK Store is an educational web project of an online store developed using **PHP and MySQL**.  
The project demonstrates the core principles of web application development, including server-side logic, database interaction, and dynamic content rendering.  It includes a user-facing storefront that allows customers to browse products, filter them by categories and brands, and manage a shopping cart, as well as an administrative panel for managing products, images, and catalog data. The project was designed to simulate the basic functionality of a real-world e-commerce system while remaining simple and easy to understand for educational purposes.


---

##  Technologies Used

- Backend: PHP (procedural)
- Database: MySQL
- Frontend: HTML5, CSS3
- UI Framework: Bootstrap
- JavaScript: jQuery (AJAX)
- Server: Apache (MAMP / XAMPP / OpenServer)

---

##  Project Features

###  User Side
- View product catalog
- Filter products by categories
- Filter products by brands
- Add products to cart
- View shopping cart
- Update product quantities in the cart
- Remove products from the cart
- Automatic total price calculation
- User registration and login
- Guest cart support (based on IP address)

---

##  Administrative Panel (Admin Panel)

The administrative panel is designed to manage the online store content without manually editing the source code.

### Main Admin Panel Features:

- Administrator authentication
- Adding new products via a web interface
- Uploading product images from the administrator’s device
- Automatic validation of image formats
- Storing uploaded images in a dedicated directory (`admin/uploads`)
- Assigning categories and brands to products
- Managing product prices, descriptions, and keywords
- Viewing the list of all products
- Supporting products added before the admin panel was implemented
- Backward compatibility with legacy images stored in `product_images`
- Centralized management of the product catalog

The admin panel significantly simplifies store management and allows dynamic updates of the product catalog without direct access to the project’s source code.

---

##  Product Images Handling

- Supported image formats: **JPG, JPEG, PNG, WEBP**
- Images are automatically displayed in a unified size
- Image proportions are preserved (no stretching)
- Backward compatibility is implemented:
  - Old images are loaded from the `product_images` directory
  - New images uploaded via the admin panel are stored in `admin/uploads`
- If an image is missing, a fallback placeholder image is used

---

##  Project Structure

```
ABK Store/
│
├── admin/                      # Administrative panel
│   ├── uploads/                # Uploaded product images
│   ├── auth.php                # Admin authentication
│   ├── dashboard.php           # Admin dashboard
│   ├── login.php               # Admin login
│   ├── logout.php              # Admin logout
│   ├── product_add.php         # Add product
│   ├── product_delete.php      # Delete product
│   └── products.php            # Product management
│
├── css/                        # Stylesheets
├── fonts/                      # Fonts
├── js/                         # JavaScript files
├── product_images/             # Legacy product images
│
├── abkstoredb.sql              # Database dump
├── action.php                  # AJAX request handler
├── cart.php                    # Cart page
├── choose_role.php             # Role selection page
├── customer_order.php          # Order processing
├── customer_registration.php   # User registration
├── db.php                      # Database connection
├── forgot_password.php         # Password recovery
├── index.php                   # Main page
├── login_form.php              # Login form
├── login.php                   # Login logic
├── logout.php                  # Logout
├── main.js                     # Main JavaScript file
├── payment_success.php         # Payment success page
├── profile.php                 # User profile
├── register.php                # User registration logic
├── style.css                   # Main styles
└── README.md                   # Project documentation
```

---

##  Installation and Setup

1. Install **MAMP / XAMPP / OpenServer**
2. Copy the project folder into the server directory:
   - `htdocs` (MAMP / XAMPP)
   - `www` (OpenServer)
3. Create a database using **phpMyAdmin**
4. Import the SQL database dump
5. Configure database connection in `db.php`
6. Open the project in a browser:
   
ABK Store - http://localhost:8888/ShoppingWebsite-master%203/ABK%20Store/index.php


Admin site - http://localhost:8888/ShoppingWebsite-master%203/ABK%20Store/admin/login.php


phpMyAdmin(Database) - http://localhost:8888/phpMyAdmin5/index.php?route=/database/structure&db=abkstoredb


## ⚠️ Important Note

This project runs on a local server environment.

To view and test the project, a local server stack such as **MAMP, XAMPP, or OpenServer** is required.

The project cannot be accessed via a public URL unless it is deployed to a hosting server.

## Photos of sites
**Main User Interface**

<img width="1512" height="858" alt="Снимок экрана 2025-12-19 в 01 33 59" src="https://github.com/user-attachments/assets/a65e5bd8-f14f-4ae5-9a09-a2da974135b6" />



**User SignIn Interface** 

<img width="1512" height="855" alt="Снимок экрана 2025-12-19 в 01 34 59" src="https://github.com/user-attachments/assets/c3eb025b-5865-4001-8f52-603ca8532443" />



**User SignUp Interface**

<img width="1512" height="856" alt="Снимок экрана 2025-12-19 в 01 35 23" src="https://github.com/user-attachments/assets/0de4e66b-9aca-4ea4-b5b1-8f326a6ca69b" />



**Login Admin Interface**

<img width="1512" height="853" alt="Снимок экрана 2025-12-19 в 01 36 43" src="https://github.com/user-attachments/assets/1967fcfc-195b-4a91-bdac-c7a354e57b99" />


**Main Admin Interface**

<img width="1512" height="857" alt="Снимок экрана 2025-12-19 в 01 37 11" src="https://github.com/user-attachments/assets/9cb20c55-1aea-4029-b0c6-abfa39eea407" />


**Products Page**

<img width="1512" height="855" alt="Снимок экрана 2025-12-19 в 01 37 34" src="https://github.com/user-attachments/assets/81581996-34d6-4e8b-b25a-9004c535cd55" />


**Database**

<img width="1512" height="858" alt="Снимок экрана 2025-12-19 в 01 37 58" src="https://github.com/user-attachments/assets/14679404-fa71-4d6c-a940-83d884d8bccf" />







