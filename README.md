## Pharmacy Management App

Please use below actions to set this app on your localhost.

- Visit github repository at https://github.com/ajithkranatunga/wireapps-pharmacy
- Clone the repository into your local machine [project_directory]. Use this command - git clone git@github.com:ajithkranatunga/wireapps-pharmacy.git
- Install mysql in your local machine and create a database for this app.
- Open .env file in the project_directory and update the database credentials.
- Run command : composer install
- Run command : php artisan key:generate
- Make sure APP_KEY is updated with the newly generated key in .env file
- Run command : php artisan migrate --seed
- Run command : php artisan storage:link
- Run command : php artisan serve

Congratulations! You have completed setting up Pharmacy Management App.
