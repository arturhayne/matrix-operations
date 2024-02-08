# League Backend Challenge

## How to run:

### Requiremets
Docker

1. Build the container:  `docker-compose up -d`
2. Get into the container: `docker-compose exec web bash`
3. Run inside the container: `php -S 0.0.0.0:8080`

## Usage

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


### Code style
Using [oskarstark](https://github.com/OskarStark/php-cs-fixer-ga) to autofix phpcs
```
docker run --rm -it -w=/app -v ${PWD}:/app oskarstark/php-cs-fixer-ga:latest
```


## What we're looking for

- The solution runs
- The solution performs all cases correctly
- The code is easy to read
- The code is reasonably documented
- The code is tested
- The code is robust and handles invalid input and provides helpful error messages
