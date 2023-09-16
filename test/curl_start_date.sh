#! /bin/bash



echo "\n===========================================================\n";

 curl -i -X GET http://my_domain/index.php/constructionStages/70
 
echo "\n===========================================================\n";


 curl -i -X PATCH -H 'Content-Type: application/json' -d '{  "duration": null, "durationUnit": null  "startDate": "2008-06-04T13:00:00Z", "endDate": "2001-02-18T19:30:00Z", "color": "#00FFFF", "externalId": 8200, "status": "NEW" }' http://my_domain/index.php/constructionStages/70
 
 echo "\n=========================================================\n";
 
  
 curl -i -X PATCH -H 'Content-Type: application/json' -d '{  "duration": null, "durationUnit": "WEEKS"  "startDate": "2008-06-04T13:00:00Z", "endDate": "2001-02-18T19:30:00Z", "color": "#00FFFF", "externalId": 8200, "status": "NEW" }' http://my_domain/index.php/constructionStages/70
 
 echo "\n=========================================================\n";
 
 
