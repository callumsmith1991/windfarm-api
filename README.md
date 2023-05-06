Windfarm API

This is an example REST API built in Laravel, it basically shows a example windfarm with turbines and their components, as well as inspection listings for each turbine

Run:

artisan migrate

artisan db:seed

To get started


Paths:

GET: 

/api/windfarm
/api/windfarm/{id}
/api/windfarm/{id}/turbines

/api/turbines
/api/turbines/{id}
/api/turbines/{id}/components

/api/inspections
/api/inspections/{id}
/api/inspections/{id}/turbines-inspections

/api/turbine-inspections
/api/turbine-inspections/{id}
/api/turbine-inspections/{id}/component-inspection
/api/turbine-inspections/{tiid}/component-inspection/{ciid}
