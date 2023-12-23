Use Docker to run this project

**Step 1**

    git clone https://github.com/barseon/nn-test.git
    cd nn-test/

**Step 2**

Rename .env.example to .env

    cp .env.example .env

**Step 3**

    docker compose up --build -d

**Step 4**

Start database migrations and composer install

    docker exec slim_php composer db-setup 
    docker exec slim_php composer install 

**Step 5**

The Api will be available at the url:

    http://localhost:8080/api/{userId}/sessions-history
    http://localhost:8080/api/{userId}/latest-domain
You can also use the Postman collection for tests *BackendChallenge.postman_collection.json*


The first part of the challenge is available at the link https://gist.github.com/barseon/0992573cd591ddd162479880178accef