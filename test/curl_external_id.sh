#! /bin/bash



 curl -i -X GET http://my_domain/index.php/constructionStages/68

 echo "\n===========================================================\n";
 
 #=======================IMPORTANT========================
 curl -i -X POST -H 'Content-Type: application/json' -d '{  "name":"Mercan 7",  "startDate": "2004-02-18T19:30:00Z", "endDate": "2009-02-18T19:30:00Z", "duration": null, "durationUnit": "HOURS",  "color": "#00FFFF", "externalId": "8200828200820080820082008200820082008200820082008282008200808200820082008200820082008200820082820082008082008200820082008200820082008200828200820080820082008200820082008200820082008282008200808200820082008200820082008200820082820082008082008200820082008200820082008200828200820080820082008200820082008200820082008282008200808200820082008200820082008200", "status": "NEW" }' http://my_domain/index.php/constructionStages
#=======================IMPORTANT========================
 
echo "\n===========================================================\n";

#============================================================================
curl -i -X POST -H 'Content-Type: application/json' -d '{ "name":"Mercan 7" , "startDate": "2021-06-04T13:00:00Z",  "durationUnit": "WEEKS", "color": null,"externalId": "82008200", "status": "NEW" }' http://my_domain/index.php/constructionStages



:
 curl -i -X PATCH -H 'Content-Type: application/json' -d '{  "startDate": "2002-06-04T13:00:00Z", "endDate": "2009-02-18T19:30:00Z", "durationUnit": "WEEKS", "color": null, "externalId": null, "status": "DELETED" }' http://my_domain/index.php/constructionStages/68
 
 echo "\n=========================================================\n";


 curl -i -X PATCH -H 'Content-Type: application/json' -d '{ }' http://my_domain/index.php/constructionStages/68
 
 echo "\n===========================================================\n";

 curl -i -X PATCH -H 'Content-Type: application/json' -d '{  "name": "Tatlikuyu Gebze",  "duration": null, "durationUnit": "YEARS", "color": null, "externalId": null, "status": "NEW" }' http://my_domain/index.php/constructionStages/67

echo "\n===========================================================\n";


 curl -i -X PATCH -H 'Content-Type: application/json' -d '{ "startDate": "2002-06-04T13:00:00Z", "endDate": "2009-02-18T19:30:00Z", "name": "Tatlikuyu Gebze",  "duration": null, "durationUnit": "HOURS", "color": null, "externalId": null, "status": "NEW" }' http://my_domain/index.php/constructionStages/68

echo "\n===========================================================\n";

 curl -i -X PATCH -H 'Content-Type: application/json' -d '{ "startDate": "2009-06-04T13:00:00Z", "endDate": "2002-02-18T19:30:00Z", "name": "Tatlikuyu Gebze",  "duration": null, "durationUnit": "HOURS", "color": null, "externalId": null, "status": "NEW" }' http://my_domain/index.php/constructionStages/68

echo "\n===========================================================\n";

 curl -i -X PATCH -H 'Content-Type: application/json' -d '{ "startDate": "2002-06-04T13:00:00Z", "endDate": "2009-02-18T19:30:00Z", "name": "Tatlikuyu Gebze",  "duration": null, "durationUnit": "HOURS", "color": null, "externalId": null, "status": "NEW" }' http://my_domain/index.php/constructionStages/68

echo "\n===========================================================\n";


 curl -i -X PATCH -H 'Content-Type: application/json' -d '{  "name": "Washington",  "duration": null, "durationUnit": "DAYS", "color": null, "externalId": null, "status": "NEW" }' http://my_domain/index.php/constructionStages/68




echo "\n===========================================================\n";

#============================================================================
curl -i -X POST -H 'Content-Type: application/json' -d '{ "name":"Mercan 7" , "startDate": "2021-06-04T13:00:00Z", , "durationUnit": "WEEKS", "color": null,"externalId": null, "status": "NEW" }' http://my_domain/index.php/constructionStages


echo "\n===========================================================\n";


#==========NO DURATION UNIT IN PERSISTENCE AND UPDATE HAS DURATION UNIT========================
curl -i -X POST -H 'Content-Type: application/json' -d '{ "name":"Mercan 8" , "startDate": "2021-06-04T13:00:00Z", , "durationUnit": "DAYS", "color": null,"externalId": null, "status": "NEW" }' http://my_domain/index.php/constructionStages

echo "\n===========================================================\n";

#==========NO DURATION UNIT IN PERSISTENCE AND UPDATE HAS DURATION UNIT========================
curl -i -X POST -H 'Content-Type: application/json' -d '{ "name":"Mercan 9" , "startDate": "2021-06-04T13:00:00Z", , "durationUnit": "HOURS", "color": null,"externalId": null, "status": "NEW" }' http://my_domain/index.php/constructionStages





