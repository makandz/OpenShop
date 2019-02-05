# OpenShop

## Inspiration
Building an online store is hard with many managed hosting solutions available on the internet like Shopify, Ebay, and more. These solutions are very convenient, but costly and not very customization. We set out to build something that almost anyone can use. Something that is bare bones to provide the ability for developers to build on top of to their liking while also providing a simple and efficient system for the not so tech-savvy to setup their own!

## What it does
All you have to do is set it up on your server and baam, you're done! A user can start visiting your website and begin making purchases through the example products that come with the database dump. You can edit the items selling, the quantity, and add a description to get users to click on and buy your product. When a user visits and finds something they want (that is still in stock!) they can add as many as they can to their cart. Once they have found everything they can proceed and pay through PayPal. Once the payment is confirmed they will receive a text message that confirms their order. Once the owner of the item is ready to ship the item they will go to the sample admin panel included and click ship on the item they wish to ship. This will result in another text message being sent to the buyer letting them know their package is on the way.

## How we built it
This was developed with HTML, CSS (with the help of MDBoostrap) for the front end. All designs were made in house! The backend of the website was developed with PHP and MySQL, as well as a few SDKs for Twilio (texting), PayPal (payments), and Twig (markup and styling) to make everything run smoothly.

## Challenges we ran into
We met some issues when the cart system was having some minor issues where it'd duplicate items. So we spent quite a while debugging it, later realizing one of the buttons had a double submit issue. We also had one minor challenge with the PayPal SDK, it would have issues trying to combine the total cost with the values that were sent through and would constantly result in errors. This issue took almost one hour to find the solution to! (It was due to an object being initialized afterwards for items with the same name, hence overwriting the last value. Darn!)

## Accomplishments that we're proud of
The design of the website we put a lot of time in perfecting the spacing and design putting as much thought into every detail to ensure the website was an attractive and enjoyable experience for the user. We also decided to make it as bare bones as possible for developers to make their own changes to it! Getting the PayPal SDK to finally work has to be another really impressive accomplishments due to how many times we fell into issues with it, but we finally did it!

## What we learned
Making such a simple design requires a lot of work and thought into detail. We spent 60% of our time perfecting every single pad, margin, and size to ensure that there was a coherent design and symmetry across the website. What we also learnt are the challenges of making a secure and efficient eCommerce platform. Being able to make a system where it'd protect against those finding loopholes through the website to skip payments or having duplicate orders, we had to think of every single way a person could possibly get through. This involved us thinking outside the box to places that we would have never thought a bug could be. (We found a bug in our email form, but we managed to fix it asap, phew!)

## What's next for OpenShop
OpenShop has a long way to go. If we had more time, we would have spent some time incorporating a members system that will allow registration and login to be supported alongside the orders. This can allow the orders to be viewed through user's accounts, as well as information being saved under users profiles to provide a better experience for the user. (Saving their history, providing better recommendations based on their viewings and purchase history, etc)
