#! /bin/bash


# curl -i -X GET http://my_domain/index.php/constructionStages

echo "\n===========================================================\n";

 curl -i -X GET http://my_domain/index.php/constructionStages/67
 
 echo "\n===========================================================\n";

 curl -i -X POST -H 'Content-Type: application/json' -d '{ "name": "Semerkand", "startDate": "2021-06-04T13:00:00Z", "endDate": null, "duration": null, "durationUnit": "HOURS", "color": null, "externalId": null, "status": "NEW" }' http://my_domain/index.php/constructionStages
 
 echo "\n===========================================================\n";
 
  curl -i -X GET http://my_domain/index.php/constructionStages/104
 
echo "\n===========================================================\n";


 curl -i -X PATCH -H 'Content-Type: application/json' -d '{ "name":"Bishkek 2", "startDate": "2021-06-04T13:00:00Z", "endDate": "2023-02-18T19:30:00Z", "durationUnit": "DAYS", "color": null, "externalId": null, "status": "NEW" }' http://my_domain/index.php/constructionStages/104
 
 echo "\n=========================================================\n";

 curl -i -X PATCH -H 'Content-Type: application/json' -d '{ }' http://my_domain/index.php/constructionStages/103
 
 echo "\n===========================================================\n";

 curl -i -X PATCH -H 'Content-Type: application/json' -d '{  "name": "Tatlikuyu Gebze",  "duration": null, "durationUnit": null, "color": null, "externalId": null, "status": "NEW" }' http://my_domain/index.php/constructionStages/55

echo "\n===========================================================\n";


 curl -i -X PATCH -H 'Content-Type: application/json' -d '{  "name": "Washington",  "duration": null, "durationUnit": null,  "color": null, "externalId": null, "status": "NEW" }' http://my_domain/index.php/constructionStages/55

echo "\n===========================================================\n";


 curl -i -X PATCH -H 'Content-Type: application/json' -d '{  "name": "Hakkari",  "duration": null, "durationUnit": null, "color": null, "externalId": null, "status": "NEW" }' http://my_domain/index.php/constructionStages/55

echo "\n===========================================================\n";


 curl -i -X PATCH -H 'Content-Type: application/json' -d '{  "name": "Washington",  "duration": null, "durationUnit": null, "color": null, "externalId": null, "status": "NEW" }' http://my_domain/index.php/constructionStages/55

echo "\n===========================================================\n";
 
 curl -i -X DELETE http://my_domain/index.php/constructionStages/113

echo "\n===========================================================\n";

#=======================IMPORTANT========================
 curl -i -X PATCH -H 'Content-Type: application/json' -d '{ "name": "Paris", "duration": null, "durationUnit": null, "endDate": "2000-06-04T19:00:00Z", "color": "#00FFFF", "externalId": 8200, "status": "NEW" }' http://my_domain/index.php/constructionStages/1
#=======================IMPORTANT========================

echo "\n===========================================================\n";

#==========NO DURATION UNIT IN PERSISTENCE AND UPDATE HAS DURATION UNIT========================
curl -i -X POST -H 'Content-Type: application/json' -d '{ "name":"Mercan 2" , "startDate": "2021-06-04T13:00:00Z", "endDate": "2021-06-04T19:00:00Z", "durationUnit": null, "color": null,"externalId": null, "status": "NEW" }' http://my_domain/index.php/constructionStages



 curl -i -X PATCH -H 'Content-Type: application/json' -d '{ "name": "Paris", "duration": null, "durationUnit": "WEEKS", "color": "#00FFFF", "externalId": 8200, "status": "NEW" }' http://my_domain/index.php/constructionStages/126
#==========NO DURATION UNIT IN PERSISTENCE AND UPDATE HAS DURATION UNIT========================


echo "\n===========================================================\n";

#============PERSISTENCE HAS EMPTY END DATE AND UPDATE HAS UGLY END DATE========================

 curl -i -X PATCH -H 'Content-Type: application/json' -d '{ "name": "Paris", "duration": null, "durationUnit": null, "endDate": "2009-06-04T19:00:00Z", "color": "#00FFFF", "externalId": 8200, "status": "NEW" }' http://my_domain/index.php/constructionStages/4

#==============PERSISTENCE HAS EMPTY END DATE AND UPDATE HAS UGLY END DATE========================



