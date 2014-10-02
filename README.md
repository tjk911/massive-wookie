Prototype community events mapping tool
===========

Another iteration of the leaflet-based mapping tool.

Goal is to provide an easy-to-use mapping tool for community members to list their public events. Targeted audience are community groups/leaders that host social events such as Smash Bros dailies or MtG Friday games etc.

Currently working on adding a datetime picker and proper user privileges, will follow that up with appropriate map filtering of makers.

Recent changes
===========

* Added date & time picker
* Added markercluster plugin
* Prepared markercluster layer for bulk loading of markers
* Added form, switched to php and added relevant scripts for pushing/pulling from DBs
* Changed marker default status to "off"
* Added login page and relevant scripts to post to DB
* Completed admin tool to delete & edit markers

Current status
===========

Far from being complete. Below is the general to-do-list.

To Do
* ~~Proper CloudMade tiles and API set-up~~
* ~~Format styling of markercluster layers~~
* ~~Record markers on either Google Docs spreadsheets or a proper database~~
* ~~Fire right-click events (currently left-click events)~~
* ~~Right-click form for details and/or photo upload~~
* Photo upload and hosting and presentation
* ~~Add admin tool to avoid trolls~~
* ~~Work on session authentication and updating db~~
* Style admin tool

Special thanks
===========
* Chris Essig (@CEssig) from Gazette.com for his original mapping code
* Jesse Hazel (@JesseWHazel) from the Courier Journal for helping troubleshoot the timepicker
* Andrew Fraser (@AndrewFraser) from SCTimes for general code help 