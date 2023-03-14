
# SETUP
```
 ./vendor/bin/sail up -d
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

## BONUS
GET 
```
localhost/api/v1/real-estate-entities?filter[price_between]=8000000,8200000&filter[address]=a&filter[size]=2676&filter[number_of_rooms]=5
```

# TODO
```
Question the db structure
Improve validation rules
Authorization and authentication
Proper testing for every endpoint and scenario
```