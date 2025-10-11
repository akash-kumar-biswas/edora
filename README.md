# Edora - E-Learning Platform

A comprehensive e-learning platform built with Laravel that provides students with an interactive learning experience and instructors with tools to manage their courses effectively.

## 🚀 Features

### Student Features
- **User Registration & Authentication**: Secure student registration and login system
- **Course Browsing**: Browse available courses with detailed information
- **Shopping Cart**: Add courses to cart and manage selections
- **Payment Processing**: Secure checkout and payment processing
- **Dashboard**: Personalized dashboard showing enrolled courses and progress
- **Profile Management**: Edit personal information and account details
- **Course Enrollment**: Enroll in purchased courses
- **Progress Tracking**: Track learning progress through courses

### Admin Features
- **Admin Authentication**: Secure admin login system
- **User Management**: Manage students and instructors
- **Course Management**: Create, update, and delete courses
- **Enrollment Management**: View and manage course enrollments
- **Report Generation**: Export reports for analytics

### Instructor Features
- **Course Creation**: Create and manage courses
- **Content Management**: Upload course materials and resources
- **Student Management**: View enrolled students and their progress

## 🛠️ Technologies Used

- **Backend**: Laravel 12
- **Frontend**: Bootstrap 5, HTML5, CSS3, JavaScript
- **Database**: MySQL
- **Authentication**: Laravel's built-in authentication with custom guards
- **File Storage**: Local file storage for course materials

## 📋 Prerequisites

- PHP >= 8.2
- Composer
- MySQL
- Node.js (optional for asset compilation)

## 🚀 Installation

1. **Clone the repository**
```bash
git clone https://github.com/akash-kumar-biswas/edora.git
cd edora
```

2. **Install dependencies**
```bash
composer install
npm install (optional)
```

3. **Environment Configuration**
```bash
cp .env.example .env
```

4. **Generate application key**
```bash
php artisan key:generate
```

5. **Database Configuration**
- Update `.env` file with your database credentials:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

6. **Run migrations**
```bash
php artisan migrate
```

7. **Seed initial data (optional)**
```bash
php artisan db:seed
```

8. **Start the development server**
```bash
php artisan serve
```

## 🔐 User Roles & Access

### Student Access
- **Login**: Navigate to `/student/login`
- **Registration**: Navigate to `/student/register`
- **Dashboard**: Available after login at `/student/dashboard`

### Admin Access
- **Login**: Navigate to `/admin/login`
- **Dashboard**: Available after login at `/admin/dashboard`

## 📝 Database Structure

The application uses the following key database tables:

- **users**: System administrators
- **students**: Student accounts
- **instructors**: Course instructors
- **courses**: Course information and content
- **carts**: Shopping cart items
- **payments**: Payment transactions
- **payment_items**: Individual payment items
- **enrollments**: Student course enrollments

## 🎨 Key Features in Detail

### Shopping Cart System
- Add/remove courses from cart
- View cart summary
- Secure checkout process
- Payment history tracking

### User Authentication
- Multi-guard authentication (student, admin, instructor)
- Secure password handling
- Session management

### Course Management
- Course browsing and search
- Detailed course information
- Instructor information display
- Course progress tracking

### Responsive Design
- Mobile-friendly interface
- Bootstrap 5 responsive components
- Cross-browser compatibility

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 🐛 Issues

If you encounter any issues, please open an issue on the GitHub repository with detailed information about the problem.

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 📞 Support

For support, please open an issue on the GitHub repository.

---

**Built using Laravel**

*This project is actively maintained and welcomes contributions from the community.*
