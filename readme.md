1) ```composer install```

2) ```rename & edit env.example```
    *Note: MAIL_ADMIN is used by AdminSeeder, if left empty default value is admin@admin.com.
            Besides admin login, if you are planing to use real email service this is where
            you will recive emails.

3) ```artisan key:generate```

4) ```artisan migrate:fresh --seed```
    *Note: seeding is required for roles and admin, you can comment out additional seeders
