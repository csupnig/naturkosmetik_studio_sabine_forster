
## Local Development
We now use docker to contain all the required services, so make sure that you have docker installed.
How to install docker-componse: [https://docs.docker.com/compose/install/](https://docs.docker.com/compose/install/)


### Working with docker
The following commands should be executed in the folder where you checked out this repository.

#### Start the local development environment
`docker-compose up`

#### Stop the local development environment
`docker-compose down`

Make sure that your local port 80 is free before starting the dev environment. E.g. you have to stop nginx
`sudo nginx -s stop`

### General
A more detailed description is found in ./phpdocker/README.md
