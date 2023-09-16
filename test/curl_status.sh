#! /bin/bash



 curl -i -X GET http://my_domain/index.php/constructionStages/68

 echo "\n===========================================================\n";
 
 #=======================IMPORTANT========================
 curl -i -X PATCH -H 'Content-Type: application/json' -d '{  "startDate": "2006-02-18T19:30:00Z", "endDate": "2009-02-18T19:30:00Z", "duration": null, "durationUnit": "HOURS",  "color": "#00FFFF", "externalId": 8200, "status": "NEW" }' http://my_domain/index.php/constructionStages/68
#=======================IMPORTANT========================
 
echo "\n===========================================================\n";


 curl -i -X PATCH -H 'Content-Type: application/json' -d '{  "startDate": "2002-06-04T13:00:00Z", "endDate": "2009-02-18T19:30:00Z", "durationUnit": "WEEKS", "color": null, "externalId": null, "status": "PLANNED" }' http://my_domain/index.php/constructionStages/68
 

echo "\n===========================================================\n";

#============================================================================
curl -i -X POST -H 'Content-Type: application/json' -d '{ "name":"Mercan 7" , "startDate": "2002-06-04T13:00:00Z", "endDate": "2009-02-18T19:30:00Z", "durationUnit": "WEEKS", "color": null,"externalId": null, "status": "DELETED" }' http://my_domain/index.php/constructionStages


echo "\n===========================================================\n";


#==========NO DURATION UNIT IN PERSISTENCE AND UPDATE HAS DURATION UNIT========================
curl -i -X POST -H 'Content-Type: application/json' -d '{ "name":"Mercan 8" , "startDate": "2021-06-04T13:00:00Z", "durationUnit": "DAYS", "color": null,"externalId": null, "status": "NEW" }' http://my_domain/index.php/constructionStages

echo "\n===========================================================\n";

#==========NO DURATION UNIT IN PERSISTENCE AND UPDATE HAS DURATION UNIT========================
curl -i -X POST -H 'Content-Type: application/json' -d '{ "name":"Mercan 9" , "startDate": "2021-06-04T13:00:00Z", "durationUnit": "HOURS", "color": null,"externalId": null, "status": "NEW" }' http://my_domain/index.php/constructionStages





