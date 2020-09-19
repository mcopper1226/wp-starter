#!/usr/bin/env bash

# Create a deploy directory that can be uploaded straight to a FTP site

theme='wp-boilerplate'
assetPath='/app/themes/wp-boilerplate/assets'

output () {
  bold=$(tput bold)
  normal=$(tput sgr0)
  echo "${bold}=====> $1${normal}"
}

if [ ! -d "web" ]
then
  output "Please run this script from the root directory."
  exit
fi

if [[ -n $(git status -s) ]]
then
  output "Please review and commit your changes before continuing."
  exit
fi

output "Removing old deploy directory"
rm -rf ../deploy/wp-content/plugins
rm -rf ../deploy/wp-content/themes

# Make sure all plugins are installed
#composer update --quiet
#composer install --quiet
output "Dependencies installed"

# Make sure JS and CSS is built
npm run build -s

# Copy to deploy
cp -a web/app/plugins ../deploy/wp-content/plugins
cp -a web/app/themes ../deploy/wp-content/themes

if [ ! -z "$1" ]
  then
    output "Changing asset paths from $assetPath to $1 in style.css"
    sed -i '' 's#'$assetPath'#'$1'#g' ../deploy/wp-content/themes/${theme}/style.css
fi

output "Done"
