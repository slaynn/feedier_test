## Hourly CSV CRON import

0 * * * * php artisan feedbackImport:hourly

## frontend for submitting a feedback

accessible on the route /feedback_submission

## weekly report

I've made a job that trigger a mail. I could have queued the mail directly but I prefer to use job as this kind of report can be sent on slack or other medium too.
