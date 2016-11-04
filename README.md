# Project HR Dashboard
__'app, a software that aids you'__

# File Structure Layout
* Main scss/js files  /resources/assets/
    * Styling for our views
    
* Main views          /resources/views/
    * Our physical HTML pages that we 'see'
    
* Routing             /routes/web.php
    * This tells the application where to send our url requests
    
* Controllers         /app/Http/Controllers/
    * This handles whatever class and function we call in the routing.
    
* Models              /app/Models/
    * This does most of our functionality related to the database.
    * Each database tabel has a Model that accesses the data.




* Landing Page w/ a navbar (dashboard)
  * General information?
<br>
* A series of choices in the navbar for different pages.
<br>
* Selecting healthcare benefits
  * Select Provider & PCP ? 
  * Add Spouse?
  * Add Dependants?
  * Add Vision?
  * Add Dental?
* Calendar
  * History of hours logged per day
  * Logging hours
  * Submitting sick/vacation
* Payroll
* Help system

<br><br>
# Possibilites
* Two Factor auth? (security)
  
* Login/Logout

##SHE SAID
* keep track of hours they worked 
* how many sick/vacation hours
* clock-in clock-out lunch-in lunch-out  
 *notify if they did not clock in
* resignation form that will allow admin to approve or deny
* what training they have done, if they have completed training courses
 * make predefined training courses that we can have checked off per user
 * every 6 months they take online training, have record of who did and didn't
 * App with video where it asks if you completed it
* payroll report
* Permission roles


# Notes for first Sprint Oct 11th
* First we must assume that there will be an administrative account already registered by the database, so the administrator can enter new employs using an employee number, name, email, which will send an email out for a user to register an account.

as a user i want to so that

1. Create administrator account
	- ability to login for administrator
	- middleware will protect the differing levels behind a middleware defined below
		- auth.admin - will route to correct dashboard  (/employees/)
		- auth.employee - will route to correct employee dashboard (/admin/)

2. administrator
	- after logging in it will get routed to the administrative landing page.
	- navbar will exist with at least one  button for managing users.
		- should have a list of users
			- delete functionaity
			- edit functionality
			- add functionality

3. user registration
	- sends out email link to user
	- user follows email link to registration page, which will prompt to set username / password
		- verified using a token which will match otherwise it will reject
	- after registering and verifying it will redirect to a dashboard welcoming
