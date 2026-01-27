# Horizon Books

A modern, full-featured online bookshop built with PHP and MySQL, offering a comprehensive book browsing and management experience.

## Live Demo

Visit the live website: [book-store.fwh.is](https://book-store.fwh.is)

## Features

### Customer Features
- **Browse Books**: View the latest arrivals and browse books by genre
- **Search Functionality**: Search for books by title, author, or genre
- **Genre Categories**: 
  - Sci-Fi
  - Education
  - Novel
  - History
  - Fiction
  - Other
- **Book Details**: View detailed information about each book including title, author, price, genre, and description
- **Responsive Design**: Fully responsive layout that works on desktop, tablet, and mobile devices
- **Interactive Carousels**: Browse books by genre with smooth horizontal scrolling carousels
- **Image Slideshows**: Eye-catching banner slideshow on the homepage

### Admin Features
- **Secure Login**: Password-protected admin panel
- **Book Management**: Add, update, and manage book inventory
- **Image Upload**: Upload book cover images
- **Store Management**: Dedicated admin store page for managing products

## Technologies Used

- **Backend**: PHP 7.4+
- **Database**: MySQL/MariaDB
- **Frontend**: HTML5, CSS3, JavaScript
- **Libraries & Frameworks**:
  - Font Awesome 6.4.0 (icons)
  - Unicons (additional icons)
  - Custom CSS for styling and animations

## Project Structure

```
bookshop/
├── index.php              # Homepage with latest arrivals and genre carousels
├── allproduct.php         # All products listing page with pagination
├── viewall.php            # View all books by specific genre
├── det.php                # Individual book details page
├── search.php             # Search results page
├── services.php           # Services information page
├── about.php              # About us page
├── store.php              # Admin store management (requires login)
├── addItem.php            # Add new book (admin only)
├── update.php             # Update book details (admin only)
├── login.php              # Admin login page
├── authenticate.php       # Login authentication handler
├── logout.php             # Logout handler
├── db.php                 # Database connection configuration
├── styles.css             # Main stylesheet
├── res-styles.css         # Responsive design styles
├── book-carousel.css      # Carousel-specific styles
├── details.css            # Book details page styles
├── fullscreen.css         # Fullscreen modal styles
├── script.js              # JavaScript functionality
├── uploads/               # Book cover images directory
└── database backup/       # Database backup files
    └── bookshop.sql       # SQL database schema
```

## Installation

### Prerequisites
- XAMPP, WAMP, or any PHP development environment
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache recommended)

### Setup Instructions

1. **Clone or Download the Project**
   ```bash
   git clone <repository-url>
   cd bookshop
   ```

2. **Set Up the Database**
   - Open phpMyAdmin or your MySQL client
   - Create a new database named `bookshop`
   - Import the database schema:
     - Navigate to `database backup/bookshop.sql`
     - Import the SQL file into your `bookshop` database

3. **Configure Database Connection**
   - Open `db.php`
   - Update the database credentials if needed:
     ```php
     $servername = "localhost";
     $username = "root"; 
     $password = ""; 
     $dbname = "bookshop";
     ```

4. **Set Up the Uploads Directory**
   - Ensure the `uploads/` directory exists and has write permissions
   - Default book images should be placed in this directory

5. **Start Your Web Server**
   - If using XAMPP, start Apache and MySQL
   - Place the project in your web server's document root (e.g., `htdocs/bookshop/`)

6. **Access the Application**
   - Open your browser and navigate to: `http://localhost/bookshop/index.php`
   - Admin login page: `http://localhost/bookshop/login.php`

## Database Schema

### Books Table
```sql
CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `genre` varchar(20) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
)
```

## Admin Access

To access admin features:
1. Navigate to `/login.php`
2. Enter admin credentials
3. Access the store management at `/store.php`
4. Add new books at `/addItem.php`
5. Update existing books at `/update.php`

## Features in Detail

### Homepage (index.php)
- Welcome banner with slideshow
- Latest 7 arrivals displayed in a grid
- Genre-specific carousels (Sci-Fi, Education, Novel, History, Fiction, Other)
- Responsive navigation menu
- Search functionality
- Footer with social media links and payment method icons

### All Products (allproduct.php)
- Display all books with pagination
- Grid layout for easy browsing
- Quick access to book details

### Book Details (det.php)
- Full book information including cover image
- Title, author, price, genre, and description
- Related books suggestions

### Search (search.php)
- Search across title, author, and genre
- Display search results in a grid format

### Admin Store (store.php)
- View all books in inventory
- Quick edit and delete options
- Add new books functionality

## Design Features

- **Color Scheme**: Warm, inviting book-themed colors (#e0ccbe, #3c3633)
- **Responsive Grid Layout**: Adapts to all screen sizes
- **Smooth Animations**: Hover effects and transitions
- **Font Awesome Icons**: Modern iconography throughout
- **Custom Book Cards**: Attractive product display cards

## Browser Compatibility

- Chrome (recommended)
- Firefox
- Safari
- Edge
- Opera

## Security Notes

- Admin authentication required for management features
- SQL injection prevention through prepared statements recommended
- Session management for admin access
- File upload validation for book images

## Future Enhancements

- Shopping cart functionality
- User registration and authentication
- Order management system
- Payment gateway integration
- Review and rating system
- Wishlist functionality
- Email notifications
- Advanced search filters

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is open source and available under the MIT License.

## Contact

For questions or support, please contact us through:
- Facebook: [facebook.com/horizonbooks](https://www.facebook.com/)
- Instagram: [instagram.com/horizonbooks](https://www.instagram.com/)
- Twitter: [x.com/horizonbooks](https://www.x.com/)
- Email: Contact form on website

## Credits

- Font Awesome for icons
- Unicons for additional iconography
- Design and development by the Horizon Books team

---

**Copyright © 2025 HorizonBooks. All rights reserved.**
