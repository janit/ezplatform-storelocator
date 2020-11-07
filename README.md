# eZ Platform Store Locator

This is an application created in the article discussing <a href="https://ezplatform.com/blog/store-locator-openstreetmap-leaflet-geojson">building a storelocator with OpenStreetMap using Leaflet.js and GeoJSON</a>. The back end used to store the data is <a href="https://ezplatform.com/">eZ Platform</a> (version 2.5), a leading Open Source DXP built using the Symfony framework.

### Installation

Here is a rough overview of how to get this up and running on a machine with PHP, MySQL, etc. core requirements already in place:

 * Clone this repository
 * Run `composer install`
 * Run `./bin/console ezplatform:install clean`
 * Run `./bin/console kaliop:migrations:migrate`
 * Install Symfony CLI from https://symfony.com/download
 * Run `symfony server:run`
 * Open https://127.0.0.1:8000/map.html

In case you run into trouble, read the full installation instructions here: <a href="https://doc.ezplatform.com/en/latest/getting_started/install_ez_platform/">Install eZ Platform</a>

## eZ Platform is now Ibexa DXP

Going forward from version 3.2 eZ Platform (Enterprise Edition) will be known as the [Ibexa DXP technology](https://www.ibexa.co/products) that is the base for three products: [Ibexa Content](https://www.ibexa.co/products/ibexa-content), [Ibexa Experience](https://www.ibexa.co/products/ibexa-experience) and [Ibexa Commerce](https://www.ibexa.co/products/ibexa-commerce). Instructions in this code should be relevant since Ibexa DXP is an evolution of eZ Platform, not a revolution. Learn more from the [Ibexa DXP v3.2 launch post](https://www.ibexa.co/blog/product-launch-introducing-ibexa-dxp-3.2) and the [Ibexa developer portal](https://developers.ibexa.co).
