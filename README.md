# Football Player Directory

This application provides a platform to view and manage football player data imported from the Sportmonks API. It allows visitors to browse, search, and view detailed information about football players stored in a local database.

## Features

- **Player Data Importation**: Automatically import and store player data from the Sportmonks API into a local database.
- **View Players**: Visitors can view a list of all football players in the database.
- **Search Functionality**: Players can be searched by their name using a search interface.
- **Browse by Nationality**: Players can be filtered and listed by their nationality.
- **Player Profiles**: Each player has a dedicated profile page displaying their name, age, gender, nationality, playing position, and a photo.


## Importing Player Data
To manually import player data from the Sportmonks API, run the following command:

```bash
php artisan app:import-players-from-sports-monk
```
This command is also scheduled to run daily by default, ensuring that the database is regularly updated with the latest player data.

## Usage
Visit http://localhost:8000 to view the application. You can browse players by their nationality, search by name, or click on any player to view detailed information on their profile page.