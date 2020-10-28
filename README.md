# Tic-Tac-Toe As A Service


## Instructions

This is the starter code for online multi-player Tic Tac Toe, where the board can be of arbitrary square size
(3x3, 10x10, etc), and where the win size can be arbitrary as well (3 in a row, 6 in a row, etc). We've set up a
 basic UI for starting a game, drawing the board on the client side, so that you can focus on game play and client/server
interaction. There are various stubs throughout the code, such as random X/Os for now, a "Find Game" button, etc. These stubs are mostly to illustrate concepts and can be leveraged or thrown away as desired.

The main laravel project code is at src/.

Obviously there are a lot of places you can go with this to get to a nice end product, but since we've set a time
limit of around 2-3 hours, you should think of how to reduce the scope so you can get to a minimum viable product
within the time limit. For example, perhaps start with random moves made by the server as the second player, while still
thinking about how you could extend it to networked multi-player. Think about how you can extend the stubbed game storage, which for the purposes of time is json file based (see /src/storage/app/games - once creating an initial game). How will you determine win state? How do you determine which players' turn it is? How do you make sure a player doesn't make a move out of turn or cheat?

You do not have to have a completely finished solution in the time allotted, but things we would like to see include:
- Client and server interaction for human player moves
- Detecting and notifying the player of the winner

We will do a retrospective after where questions include:
- What would you do differently? (implying you don't have to like all of it!)
- What is something that you liked how you approached/solved it?
- etc...

## Installation and Running
To get started, make sure you have [Docker installed](https://docs.docker.com/docker-for-mac/install/) on your system, and then navigate to this project.

Run `docker-compose up` and the projects will boot. You can access the home page via `http://localhost:8080`.

## Key Project Paths
- src/public: public asset files, such as style.css
- src/resources/views: has layouts and various pages
- src/app/Services/GameServiceProvider.php: game logic starting point
- src/app/Http/Controllers/GamesController.php: self explanatory once looked at
- src/routes/web.php: self explanatory once looked at
- src/storage/logs: debugging logs go here if using the Log utility class

## Key Laravel Documentation Pages
- https://laravel.com/docs/8.x/blade
- https://laravel.com/docs/8.x/controllers
- https://laravel.com/docs/8.x/routing

## Other Notes
- JQuery is included via CDN in the head of the primary layout, note the home page on it's usage and CSRF concerns