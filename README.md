# League Backend Challenge

## How to run:

1. Build the container:  `docker-compose up -d`
2. Get into the container: `docker-compose exec web bash`
3. Run inside the container: `php -S 0.0.0.0:8080`

Note: you can skip step 2 and 3 running `docker-compose exec web php -S 0.0.0.0:8080`

### Requiremets
Docker

## Usage

Be sure the .csv file in the current folder or set the file folder in the curl call.
Echo:
```
$ curl -F 'file=@matrix.csv' "localhost:8080/echo"
1, 2, 3
4, 5, 6
7, 8, 9

Invert:
```
$ curl -F 'file=@matrix.csv' "localhost:8080/invert"
1, 4, 7
2, 5, 8
3, 6, 9

Flatten:
```
$ curl -F 'file=@matrix.csv' "localhost:8080/flatten"
1, 2, 3, 4, 5, 6, 7, 8, 9
```
Sum:
```
$ curl -F 'file=@matrix.csv' "localhost:8080/sum"
45
```
Multiply:
```
$ curl -F 'file=@matrix.csv' "localhost:8080/multiply"
362880
```

### About the .csv file
The input file to these functions is a matrix, of any dimension where the number of rows are equal to the number of columns (square). Each value is an integer, and there is no header row. matrix.csv is example valid input.

## About the Code
Main Classes:
 - MatrixOperationHandler: the orchestrator, responsible to call and connect other classes
 - ResponseHandler: Responsible to manage and return the response
 - Router: Responsible to execute the proper operation acording the 'uri'
 - FileManager: Responsible to load the file and return a matrix
 - Matrix: Domain core class the encaspulate the operations and matrix entity
 
### Flow
index.php ->  MatrixOperationHandler -> FileManager -> Matrix -> Router -> ResponseHandler


### Code style
Using [oskarstark](https://github.com/OskarStark/php-cs-fixer-ga) to autofix phpcs
```
docker run --rm -it -w=/app -v ${PWD}:/app oskarstark/php-cs-fixer-ga:latest
```

### Tests

Required execute `compser instal` inside container, before execute tests `endor/bin/phpunit` 

```
# vendor/bin/phpunit --testdox                          
PHPUnit 10.5.10 by Sebastian Bergmann and contributors.

Runtime:       PHP 8.1.27
Configuration: /var/www/html/phpunit.xml

.........................                                         25 / 25 (100%)

Time: 00:00.133, Memory: 8.00 MB

File Manager
 ✔ Is valid file
 ✔ Process file
 ✔ Invalid file
 ✔ Process file does not exist

Matrix
 ✔ Echo
 ✔ Invert
 ✔ Flatten
 ✔ Sum
 ✔ Multiply
 ✔ Multiply with empty
 ✔ Sum with empty

Matrix Operation Handler
 ✔ Echo operation
 ✔ Invert operation
 ✔ Single row file
 ✔ Empty file

Response Handler
 ✔ Show with matrix
 ✔ Show with vector
 ✔ Show with scalar value
 ✔ Show with empty array

Router
 ✔ Router with data set 0
 ✔ Router with data set 1
 ✔ Router with data set 2
 ✔ Router with data set 3
 ✔ Router with data set 4
 ✔ Invalid route

OK (25 tests, 28 assertions)
```
