# SIMPLE CRUD APPLICATION Laminas Mezzio


- - - 

RUN Instructions:
Rename docker.compose.yml.dist to docker-compose.yml
docker compose up
composer install
sudo vi /etc/host   -> ADD -> customer-api.local 10.25.0.10
Above command will make sure that the above host is reachable at 443.


This will run 2 container:
1. customer api
2. DB Container


Tried Features(Not in Best Shape though):
1. SSL
2. Auth(Basic Auth)
3. CRUD

Currently it is tested via REST CLI Tool for API Calls or Corresponding curl api Calls.

**DELETE:**

DELETE /api/v1/customer/<ID> HTTP/1.1
Host: customer-api.local
Authorization: Basic <AUTH_STRING>>



**Update:**

PATCH /api/v1/customer/<ID>> HTTP/1.1
Host: customer-api.local
Authorization: Basic <AUTH_STRING>>
Content-Type: application/json
Content-Length: 45

{
"brewery_id": 812,
"name": "Hocus Pocus"
}


**CREATE:**

POST /api/v1/customer HTTP/1.1
Host: customer-api.local
Authorization: Basic <AUTH_STRING>>
Content-Type: application/json
Content-Length: 453

{
"brewery_id": 812,
"name": "Hocus Pocus",
"cat_id": 11,
"style_id": 116,
"abv": 4.5,
"ibu": 0,
"srm": 0,
"upc": 0,
"filepath": "",
"descript": "Our take on a classic summer ale.  A toast to weeds, rays, and summer haze.  A light, crisp ale for mowing lawns, hitting lazy fly balls, and communing with nature, Hocus Pocus is offered up as a summer sacrifice to clodless days. Its malty sweetness finishes tart and crisp and is best apprediated with a wedge of orange.",
"add_user": 0
}

**READ:**

GET /api/v1/customer/<ID> HTTP/1.1
Host: customer-api.local
Authorization: Basic <AUTH_STRING>>


GET /api/v1/customer?start=0&limit=2 HTTP/1.1
Host: customer-api.local
Authorization: Basic <AUTH_STRING>>


_Sample Auth String: a29kZGxvOmtvZGRsbw==









