1) ```composer install```

2) ```rename & edit env.example```

    *Note: MAIL_ADMIN is used by AdminSeeder, if left empty default value is admin@admin.com.
            Besides admin login, if you are planning to use real email service this is where
            you will receive emails.

3) ```artisan key:generate```

4) ```artisan migrate:fresh --seed```

    *Note: seeding is required for roles and admin, you can comment out additional seeders
    
Default admin password is password.
You can change it in AdminSeeder.
