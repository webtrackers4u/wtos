## wtOS Content Management System v2.0
> We'vw deleted```wtHome.php``` and ```wtContent.php``` alternatively the new templating system is introduced.

1. To create a template you have to create a file in a pattern ```template-[TEMPLATE_NAME].php```. You can also create a template for specific slug like ```page-[SLUG].php```


2. You can use custom fields for any templates. For that you have define field names and types inside ```/wtosApps/config/fields.json``` for a specific template. By declareing a field a user can change this value from backend.


3. We have introduced PSR-4 Autoloader that means you don't need to back up whole project do backup excluding ```/vendor``` folder. After that run ```composer install``` 


4. We've used ```tinimce v5``` through *Composer* that means you also don't need to carry old ```/tiny_mce``` folder it is included with composer.


5. We have introduced few new static classes inside ```/library/Classes``` ```Session``` ```Request``` ```Db``` and important ```Template```.


6. We have integrated integrated ``Medoo`` as ORM library.


7. We have  integrated `Tracy` as debugging console. Please go through the documentation to learn more.
