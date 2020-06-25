**LéonLab**

LeonLab is a website project of video game store.
Users can buy video games and they will receive a mail with access code and a bill 
Administrators can add and delete games. They also have acces to statistics about the website.

## To begin
###  Pre-requisites

- Laravel version 6 minimum
- The project has been developped with a MySQL Database

### Installation
In a first place you need to clone the git project.
Then it's necessary to configure the ***.env*** file. with your database access
```
DB_CONNECTION=mysql
DB_HOST= database host (ex: AlwaysData)
DB_PORT=3306
DB_DATABASE= database name
DB_USERNAME=database username
DB_PASSWORD=database password
```
To send mails with Google you need to configure your ***.env*** file
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.googlemail.com
MAIL_PORT=465
MAIL_USERNAME= email address
MAIL_PASSWORD= password
MAIL_ENCRYPTION= encryption type (tls ssl)
```
At the end you need to make a ```composer install``` to  download all the dependencies of the project.

## Made with 
To realise this project we used Laravel and 
- ChartJs Library
- Laravel DomPDF Library
- Laravel ShoppingCart Library


## Auteurs


- **Auriane Labille**  _alias_  [@Fanghienne](https://github.com/Fanghienne)
- **Léone Lalloué**  _alias_  [@LeoneLal](https://github.com/LeoneLal)
Read the list of all  [contributors](https://github.com/LeoneLal/leonlab/graphs/contributors)   to see who helped the project!

