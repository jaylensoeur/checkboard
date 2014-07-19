checkboard
==========
A little cli program that displays to the console a checkerboard base on the number of rows and cols that is requested.
````ASCII
Drawing checker board
Row      : 6
Column   : 6
+----+----+----+----+----+----+
|    |####|    |####|    |####|
|    |####|    |####|    |####|
+----+----+----+----+----+----+
|####|    |####|    |####|    |
|####|    |####|    |####|    |
+----+----+----+----+----+----+
|    |####|    |####|    |####|
|    |####|    |####|    |####|
+----+----+----+----+----+----+
|####|    |####|    |####|    |
|####|    |####|    |####|    |
+----+----+----+----+----+----+
|    |####|    |####|    |####|
|    |####|    |####|    |####|
+----+----+----+----+----+----+
|####|    |####|    |####|    |
|####|    |####|    |####|    |
+----+----+----+----+----+----+
````
````ASCII

./checkerboard-drawer --cols 3 --rows 4

Drawing checker board
Row      : 4
Column   : 3
+----+----+----+
|    |####|    |
|    |####|    |
+----+----+----+
|####|    |####|
|####|    |####|
+----+----+----+
|    |####|    |
|    |####|    |
+----+----+----+
|####|    |####|
|####|    |####|
+----+----+----+
````
#### Installation
`git clone https://github.com/jaylensoeur/checkerboard.git`

`curl -sS https://getcomposer.org/installer | php`

`./composer.phar install`

#### Usage:
`./bin/checkerboard-drawer --cols [number] --rows [number]`
