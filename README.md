
# SETUP
For the sake of simplicity i have added the .env file and vendor in the repo (I would never do that normally)
So all you need to run is
```
 ./vendor/bin/sail up -d
 ./vendor/bin/sail artisan config:cache
 ./vendor/bin/sail artisan migrate
 ./vendor/bin/sail artisan db:seed

 if you want to run a test
./vendor/bin/sail artisan config:clear
./vendor/bin/sail artisan test  --filter RealEstateEntityTest
./vendor/bin/sail artisan config:cache

```

When you are done
```
 ./vendor/bin/sail down -v
```

# COMMENTS
The task is pretty basic but it covers some of the aspects of production ready code
```
There are tests tho very, very basic (written for the sake of writting tests), but ofc every api should have all of it's endpoints tested (but also unit tests)
Api is versioned
There are transformation layers (api resources)
Relathionships are eager loaded so no n+1
Foreign keys used where necessary
Requests are validated and only the validated data is used when injecting into the DB
Api is following a JSON API standard (as close as the package that i used is doing it but it should be very close)
```
# EXAMPLES

GET 
```
localhost/api/v1/real-estate-entities?filter[price_between]=8000000,8200000&filter[address]=a&filter[size]=2676&filter[number_of_rooms]=5
```

POST 

```
localhost/api/v1/real-estate-entities

{
    "address":"address1",
    "price":100,
    "latitude": 44.787197,
    "longitude": 20.457273,
    "number_of_rooms": 3,
    "size": 60.5,
    "type_id": 1
}
```

PATCH 

```
localhost/api/v1/real-estate-entities/1

{
    "address":"Updated",
}
```


SHOW 

```
localhost/api/v1/real-estate-entities/1
```

DELETE 

```
localhost/api/v1/real-estate-entities/1
```

## BONUS
GET 
```
localhost/api/v1/real-estate-entities?filter[price_between]=8000000,8200000
```

# TODO
```
Question the db structure
Improve validation rules
Authorization and authentication
Proper testing for every endpoint and scenario
```
