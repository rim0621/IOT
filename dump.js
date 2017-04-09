var express = require('express');
var app = express();
var fs= require('fs');
var date=new Date();
mysql = require('mysql');
var connection = mysql.createConnection({
    host: 'localhost',
    user: 'sensor',
    password: 'mypassword',
    database: 'data',

})
connection.connect();

r={};
r.seq=0;
r.type='T';
r.device='102';
r.unit='0';
r.ip="10.42.0.14";
r.value=0;


app.get("/jh", function(req, res) {
  console.log("param=" + JSON.stringify(req.query));

  r.value=parseFloat(req.query.temp);
  fs.appendFile('message.txt', JSON.stringify(req.query)+ ","+r.ip+","+date+"\n", function (err){
     if (err) throw err;
 
  });


  var query = connection.query('insert into sensors set ?', r, function(err, rows,cols){
//    if (err) throw err;
    
  });



  var qstr = 'select * from sensors where time > date_sub(now(), INTERVAL 1 DAY) ';
  connection.query(qstr, function(err, rows, cols) {
    if (err) {
//      throw err;
      res.send('query error: '+ qstr);
      return;
   }
    
    var data=new Date();
    console.log("Got "+ rows.length +" records");
    var html = "<!doctype html><html><body>";
    html += "<H1> Sensor Data for Last 24 Hours</H1>";
    html += "<table border=1 cellpadding=3 cellspacing=0>";
    html += "<tr><td>Seq#<td>Time Stamp<td>Temperature";
    for (var i=0; i<rows.length; i++) {
      html += "<tr><td>"+i+"<td>"+ JSON.stringify(rows[i].time)+"<td>"+ JSON.stringify((rows[i].value));
      
    }
    html += "</table>";
    html += "</body></html>";
    res.send(html);
  });

});


app.listen(3000, function () {
  console.log('Example app listening on port 3000!')
})
