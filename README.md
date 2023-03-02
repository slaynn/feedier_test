## Hourly CSV CRON import

0 * * * * php artisan feedbackImport:hourly

## frontend for submitting a feedback with login guard

build the frontend with command :
```vite```

launch the project with
```php artisan serve```

## weekly report

I've made a job that trigger a mail. I could have queued the mail directly but I prefer to use job as this kind of report can be sent on slack or other medium too.
