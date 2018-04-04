
<?php
   // connect to mongodb
   $m = new MongoClient();
	
   echo "Connection to database successfully<br>";
   $db = $m->test;
   echo "Database mydb selected<br>";
$collection = $db->collection_sample;
echo "collection ook<br>";

   $cursor = $collection->find();
   // iterate cursor to display title of documents
	
   foreach ($cursor as $document) {
      echo("Name: ".$document['name']." - Age: ".$document['age']." - Gender: ".$document['gender']." - Place: ".$document['place']."<br>");
   } 
?>