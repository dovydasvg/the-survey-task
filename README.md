Simple Laravel Survey app.

[Live Demo](http://the-survey-task.herokuapp.com/)

###Stack:
#### *Laravel* runs the backend
#### *VueJS* runs the frontend
#### *InertiaJS* connects the two
#### *TailwindCSS* makes this beautiful
#### *JetStream* helped set the Auth System.
#### Default db: mysql.

### To use this survey app:

#### You'll need to have Docker installed.

`Setup your .env file`<br>
`./vendor/bin/sail up -d`<br>
`./vendor/bin/sail artisan migrate`<br>

#### Or just install the app to run on your local machine.

`composer install`<br>
`npm install`<br>
`Setup your .env file`<br>

### To test this survey app:

`Setup your .env file`<br>
`./vendor/bin/sail up -d`<br>
#### Migrate and seed:
`./vendor/bin/sail artisan migrate:refresh --seed`<br>


### Models:

- Users
- Questions
- Answers

### Cheers.
