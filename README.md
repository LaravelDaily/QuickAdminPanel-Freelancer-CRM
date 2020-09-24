# Laravel 8 project for managing freelance projects, notes and income

It is a demo project for demonstrating what can be generated with [QuickAdminPanel](https://quickadminpanel.com) tool.

Features:
- CRUDs for Clients, Projects, Notes, Documents and Transactions
- Simple Report for Income per Month
- CRUDs for Settings - Currencies, Transaction Types, Client/Project Statuses
- Based on [AdminLTE 3 Free Theme](https://adminlte.io/themes/dev/AdminLTE/index.html) (Bootstrap 4)

![Freelancer CRM screenshot report](https://laraveldaily.com/wp-content/uploads/2019/09/freelancer-crm-report.png)

![Freelancer CRM screenshot transactions](https://laraveldaily.com/wp-content/uploads/2019/09/freelancer-crm-transactions.png)

## How to use

- Clone the repository with __git clone__
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run __composer install__
- Run __php artisan key:generate__
- Run __php artisan migrate --seed__ (it has some seeded data for your testing)
- That's it: launch the main URL and login with default credentials __admin@admin.com__ - __password__

## License

Basically, feel free to use and re-use any way you want.

---

## More from our LaravelDaily Team

- Check out our adminpanel generator [QuickAdminPanel](https://quickadminpanel.com)
- Read our [Blog with Laravel Tutorials](https://laraveldaily.com)
- FREE E-book: [50 Laravel Quick Tips (and counting)](https://laraveldaily.com/free-e-book-40-laravel-quick-tips-and-counting/)
- Subscribe to our [YouTube channel Laravel Business](https://www.youtube.com/channel/UCTuplgOBi6tJIlesIboymGA)
- Enroll in our [Laravel Online Courses](https://laraveldaily.teachable.com/)
