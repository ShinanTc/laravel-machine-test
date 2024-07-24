### User Authentication and Authorization System in Laravel: Setup Guide

This project implements a user authentication and authorization system using Laravel, fulfilling the requirements outlined in a machine test.

## User Roles:
* Teacher
* Student

## Prerequisites:

* PHP >= 8.0
* Composer
* A MySQL database server

## Installation:

* open windows powershell or git bash
* git clone https://github.com/ShinanTc/laravel-machine-test.git
* get into the project directory `cd ./laravel-machine-test`
* run command `composer install` for installing all the dependancies
* rename the `.env.example` file to `.env`
* Update the .env file with your database credentials and other necessary settings:

    For Example:

        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=sample_db
        DB_USERNAME=root
        DB_PASSWORD=password

* run `php artisan key:generate`
* run `php artisan migrate`

## Testing the application

* run `php artisan serve`

Now you will have the homepage of the project.

# User Authentication & Teacher Registration

From the corner of the right hand side, there will be `Login` & `Register`.
You can create a teacher from the Register page and authenticate as a Student or a Teacher from the Login Page.
On Register, you can check all the validation condition you have mentioned which are :

            - Email Address
                [x] Unique

            - Password
                [x] Minimum Length
                [x] Presence of Uppercase
                [x] Presence of Lowercase
                [x] Presence of Special Characters

# Password Recovery

For this, you have to make sure you are registered with a real email. Then go to `Manage your google account`. Make sure 2 Factor Authentication is enabled on that email. Then go to security, then on the search bar search for `App Password`. Then select it and Give it any name. Then generate the password, copy it it will look something like : asdd asdd asdd asdd. Remove the spaces in between and update your .env file like below:

        MAIL_MAILER=smtp
        MAIL_HOST=smtp.gmail.com
        MAIL_PORT=465
        MAIL_USERNAME=user@gmail.com
        MAIL_PASSWORD=cxpqkqvefwksfeap
        MAIL_ENCRYPTION=ssl
        MAIL_FROM_ADDRESS="fromproject@gmail.com"
        MAIL_FROM_NAME="${APP_NAME}"

Now when you click Forgot Password on the login page & give your email address, you will get a resend link from whatever mail you have given on MAIL_FROM_ADDRESS variable.


# Creating Student

/teacher/add_student route can be used to create student data. For that you can simply search `{{yourlocalhost}}/teacher/add_student`. From there you can see the form for that. After creating a student you can login as a student as well.

# Creating Subject

`/teacher/add_subject` route can be used to create subject. For that you can simply search `{{yourlocalhost}}/teacher/add_subject`. From there you can see the form for that as well.

# Adding Mark

`/teacher/add_marks` route can be used to add marks for students. For that you can simply search `{{yourlocalhost}}/teacher/add_marks`. From there you can see the form for that. Enter student name, Subject name, and Mark. That's it.

# Filter by Pass & Fail

`/teacher/view_students` route can be used to see the student name, subject, its mark and the status (Pass/Fail). There is 3 buttons to filter how you see the data. `Filter by Pass`, `Filter by Fail` and `Show All`. You can see the data by filtering them as you like.

# View & Update User Data

After logging in on the right side corner, there you can see your username. Click on that, and select `Profile`, from there you can edit your userdata.

# Viewing Progress card

`/student/view_progress_card` route is accessible to both students & Teachers. Teachers can see all the students marks (They already have another route to do that which is `/teacher/view_student_data`, so this route wont have any filters). If student is the user, he can only see the marks of himself. 

# Restrcting Access

Every /teacher/ parent route is restricted to teachers only. You will get an Unauthorized error if you try to acccess it as a student. We have used an IsTeacher middleware to implement this which is inside `app\Http\Middleware`.



## Notes & Apologies

Apologies for the delay and time constraints that hindered the completion of the following features:

- An admin user was not created as the Teacher account already possesses superuser access to all resources and actions.
- Two-factor authentication was not implemented.
- Front-end design did not receive sufficient investment.
- Comprehensive unit testing was not conducted.
- Code organization and optimization were not fully accomplished.

I regret any inconvenience caused. The opportunity and your patience are sincerely appreciated. Your feedback is welcome. If you have any further doubts, feel free to contact me. Thank you.