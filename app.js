
var express = require('express');
var app = express();
var fs = require('fs');



app.get('/', function (req, res) {
  res.send('Hello World!');
       
    fs.appendFile('message.txt', JSON.stringify(req.query)+ "\n", function (err){ 
         if (err) throw err;
  
   
  });	
  
});

app.listen(3000, function () {
  console.log('Example app listening on port 3000!');
});
