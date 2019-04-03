## Testing project

Project based on Laravel
## Run project
1. Copy project
2. Run *php artisan migrate*
3. Run *php artisan passport:install*


## Postman file
*project_dir/Testing.postman_collection.json*

## Cron 
You can run cron 2 ways
1. `* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1` cron for calculating result are realised by Laravel schedule. Time fo calculating sum are write there.
2. `* * */2 23 47 cd /path-to-your-project && php artisan make:command transactionSum >> /dev/null 2>&1` or you can run only this script to calculate sum.
Data will be exported to csv file to /path-to-your-project/storage/
