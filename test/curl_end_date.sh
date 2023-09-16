#! /bin/bash

 echo "\n===========================================================\n";

 curl -i -X GET http://my_domain/index.php/constructionStages/55
 
 curl -i -X PATCH -H 'Content-Type: application/json' -d '{  "name": "Tatlikuyu Gebze" , "startDate": "2002-06-04T13:00:00Z", "endDate": "2009-02-18T19:30:00Z" "durationUnit": null, "color": null, "externalId": null, "status": "NEW" }' http://my_domain/index.php/constructionStages/55

echo "\n===========================================================\n";
 
 
echo "\n===========================================================\n";


 curl -i -X PATCH -H 'Content-Type: application/json' -d '{  "duration": null, "durationUnit": "WEEKS",  "startDate": "2002-06-04T13:00:00Z", "endDate": "2009-02-18T19:30:00Z", "color": "#00FFFF", "externalId": 8200, "status": "NEW" }' http://my_domain/index.php/constructionStages/55
 
 echo "\n=========================================================\n";
 
 
 curl -i -X PATCH -H 'Content-Type: application/json' -d '{  "duration": null, "durationUnit": "DAYS",  "startDate": "2002-06-04T13:00:00Z", "endDate": "2009-02-18T19:30:00Z", "color": "#00FFFF", "externalId": 8200, "status": "NEW" }' http://my_domain/index.php/constructionStages/55
 
 echo "\n=========================================================\n";
 
 
 curl -i -X PATCH -H 'Content-Type: application/json' -d '{  "duration": null, "durationUnit": "HOURS",  "startDate": "2002-06-04T13:00:00Z", "endDate": "2009-02-18T19:30:00Z", "color": "#00FFFF", "externalId": 8200, "status": "NEW" }' http://my_domain/index.php/constructionStages/55
 
 echo "\n=========================================================\n";

 curl -i -X PATCH -H 'Content-Type: application/json' -d '{ }' http://my_domain/index.php/constructionStages/55
 
 echo "\n===========================================================\n";

echo "\n===========================================================\n";

:'
#============================================================================
curl -i -X POST -H 'Content-Type: application/json' -d '{ "name":"Mercan 7" , "startDate": "2021-06-04T13:00:00Z", , "durationUnit": "WEEKS", "color": null,"externalId": null, "status": "NEW" }' http://my_domain/index.php/constructionStages


echo "\n===========================================================\n";


 curl -i -X PATCH -H 'Content-Type: application/json' -d '{  "duration": null, "durationUnit": "HOURS",   "endDate": "2009-02-18T19:30:00Z", "color": "#00FFFF", "externalId": 8200, "status": "NEW" }' http://my_domain/index.php/constructionStages/<id>
 
 echo "\n=========================================================\n";

#============================================================================
curl -i -X POST -H 'Content-Type: application/json' -d '{ "name":"Mercan 7" , "startDate": "2021-06-04T13:00:00Z", "durationUnit": null, "color": null,"externalId": null, "status": "NEW" }' http://my_domain/index.php/constructionStages


echo "\n===========================================================\n";

 curl -i -X PATCH -H 'Content-Type: application/json' -d '{  "duration": null, "durationUnit": "WEEKS",   "endDate": "2009-02-18T19:30:00Z", "color": "#00FFFF", "externalId": 8200, "status": "NEW" }' http://my_domain/index.php/constructionStages/<id>
 
 echo "\n=========================================================\n";
 #============================================================================
curl -i -X POST -H 'Content-Type: application/json' -d '{ "name":"Mercan 7" , "startDate": "2021-06-04T13:00:00Z",  "durationUnit": null, "color": null,"externalId": null, "status": "NEW" }' http://my_domain/index.php/constructionStages


echo "\n===========================================================\n";

 curl -i -X PATCH -H 'Content-Type: application/json' -d '{  "duration": null, "durationUnit": "DAYS",   "endDate": "2009-02-18T19:30:00Z", "color": "#00FFFF", "externalId": 8200, "status": "NEW" }' http://my_domain/index.php/constructionStages/<id>
 
 echo "\n=========================================================\n";

