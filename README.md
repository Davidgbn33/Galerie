# Galerie

# Presentation 

- This is a site of a picture gallery for a painter
- In the directory Document you have the backlog, Figma screenshots and database modeling.

# to start the Project :

 - create .env.local
 - composer install
 - yarn install
 - yarn encore dev
 - symfony console doctrine:database:create
 - symfony console make:migration
 - symfony console doctrine:migrations:migrate
 - symfony console doctrine:fixtures:load
 - symfony server:start Run yarn run dev --watch

# Connection

- If you want to connect in Admin
  
- you can use 'admin@me.fr' for the password check the fixture file

- If you want to connect you can create a user
