##CodesBug Advanced Sorting Extension
Advanced Sorting extension allows customers to sort products by Best Sellers, Top Rated, New Arrivals, Most Viewed, Reviews Count, Low to High Price and High to Low Price options on catalog listing page.

##Support:
version - 2.3.x

##How to install Extension

1. Download the archive file.
2. Unzip the files
3. Create a folder [Magento_Root]/app/code/Sparsh/AdvancedSorting
4. Drop/move the unzipped files

#Enable Extension:

- php bin/magento module:enable CodesBug_AdvancedSorting
- php bin/magento setup:upgrade
- php bin/magento cache:clean
- php bin/magento setup:static-content:deploy
- php bin/magento cache:flush

#Disable Extension:

- php bin/magento module:disable CodesBug_AdvancedSorting
- php bin/magento setup:upgrade
- php bin/magento cache:clean
- php bin/magento setup:static-content:deploy
- php bin/magento cache:flush
