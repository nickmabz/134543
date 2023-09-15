## Park Prediction

### Installation Instructions - [Local Deployment]

To install, open command prompt and type:

```bash
$ cd C://xampp/htdocs/
$ git clone https://github.com/nickmabz/134543.git
$ cd parkprediction
$ composer update
$ copy .env.example .env
$ php artisan key:generate
$ php artisan migrate
$ php artisan db:seed
$ php artisan storage:link
$ php artisan serve
```

### License

The parkpredict project is open-sourced software licensed under the [Apache license](http://www.apache.org/licenses/).
