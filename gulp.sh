#!/usr/bin/env bash

GULP='yes'

if [[ $GULP=='yes' ]];
    then
    sudo npm install -g gulp
    sudo npm install gulp --save-dev
    sudo npm install gulp-sass --save-dev
    sudo npm install gulp-minify-css --save-dev
    sudo npm install gulp-uglify --save-dev
    sudo npm install gulp-concat --save-dev
    sudo npm install gulp-rename --save-dev
    sudo npm install browser-sync --save-dev
    exit ;
fi