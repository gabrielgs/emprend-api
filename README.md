# emprend-api

This repo is for the challenge to frontend developers, and the goal is to have the integration with rest api, the consume for paths and services and can demostrate the correct implementation of this technology with other related frameworks like vue.js, angular.js, mobile, etc.

## How Use

The technology used in this api,  try to have the best enviorement based on PHP fpm 7.3, nginx, mysql and laravel 6.x.

Now, to run this APi follow the next steps. I had make the assumtion that you have linux or macOSX system.

## Prerequisites 

For the correct execution of the enviorement, you need have instaled docker on your machine. 

Please refer to https://docs.docker.com/install/ to install if require.

### Get the source 

First you need get the source for this repository, then clone this from github in one folder to execute the enviorement. Please make the directory for them on your home folder.

    git clone https://github.com/fakereto/emprend-api.git

The repository have a **Dockerfile** for docker image build and a **docker-compose.yml** file for the services with docker. Please feel free to explore them.

In the src folder are located all the files for the api to run, please don't changeit because the challenge is for a frontend developer, no to fix any bug on the api. If you find a bug, please send it on Issues Page: https://github.com/fakereto/emprend-api/issues/new

### Runing the api

To run the api for this challenge, do the next:

    docker-compose up

This will get the environment configuration of the api, will build the image for docker api and execute the database, migrations and seed.

Please be patient, this can take some minutes to download the base docker images, execute composer and other tasks.

After of the end of the task, now you can execute the browser for the page http://localhost:8000

Here you will find the index page for the Api and one link to **API DOCS** or navigate to http://localhost:8000/storage/openapi.json on your browser. Here are the openapi documentation for api implementation.

Now to here all is fine. Come to code and enjoy!