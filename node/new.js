var http = require('http');
var url = require('url');
var fs = require('fs');

//events
var event = require('events');
var emitter = new event.EventEmitter();
var handler = function(){
    console.log('screaming aaaaaa');
}

//mongodb
//var mongo = require('mongodb');
var client = require('mongodb').MongoClient;
var url = 'mongodb://localhost:27017/mydb';

client.connect(url,function(err,db){
    if (err) throw err;
    // console.log('db created');
    //db.close();

    //create table
    /*db.createCollection('books',function(err,res){
        if (err) throw err;
        console.log('table created');
        db.close();
    });*/

    //insertinto
   /* var obj = {title:'the book one', author:'abcd'};
    db.collection('books').insertOne(obj,function(err,res){
       if (err) throw err;
        console.log('inserted');
    });
   obj = {title:'book two',author:'the newone',year:'2012'};
   db.collection('books').insertOne(obj,function(err,res){
       if(err)throw err;
       console.log('inserted');
   });*/

   //find/select
    db.collection('books').findOne({author:'the newone'},function(err,result){
        if(err) throw err;
        console.log(result);
    });

    db.collection('books').find({}).toArray(function(err,result){
        if (err)throw err;
        console.log(result);

    });
});

emitter.on('scream',handler);
emitter.emit('scream');


var f = require('formidable');

http.createServer(function (req, res) {
    //url module + http module
    /*res.writeHead(200, {'Content-Type': 'text/html'});
   res.write('Hello World!'+req.url);
    var q = 'http://localhost:8080/default.htm?year=2017&month=february';
    var q1 = url.parse(q,true);
    console.log(q1.host);
    console.log(q1.pathname);
    console.log(q1.search);

    var v = q1.query;
    var txt = v.year+" "+v.month;
    console.log(txt);*/

    //file module
  /* var q = url.parse(req.url,true);
   q = "."+q.pathname;
    fs.readFile(q,function (err,data){
        if (err) {
            res.writeHead(404, {'Content-Type': 'text/html'});
            return res.end("404 Not Found");
        }
        res.writeHead(200, {'Content-Type': 'text/html'});
        res.write(data);
        return res.end();
    });

    fs.open('hello.txt','w',function (err,file){ //appendFile, writeFile, unlink(delete)
       if (err) throw err;
        console.log('saved');
    });*/

  //upload files
    if (req.url == '/fileupload'){
        var form = new f.IncomingForm();
        form.parse(req, function (err, fields, files) {
            res.write('File uploaded');
            var oldpath = files.filetoupload.path;
            var newpath = 'C:/wamp/www/node/'+files.filetoupload.name;
            fs.rename(oldpath,newpath,function(err){
                if (err) throw err;
                res.write('uploaded and moved');
                res.end();
            });
        });
    }
    else {
        res.writeHead(200, {'Content-Type': 'text/html'});
        res.write('<form action="fileupload" method="post" enctype="multipart/form-data">');
        res.write('<input type="file" name="filetoupload"><br>');
        res.write('<input type="submit">');
        res.write('</form>')
        return res.end();
    }

}).listen(8080);

console.log("1");