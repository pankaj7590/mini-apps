var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);


app.get('/', function(req, res){
	res.sendFile(__dirname + '/index.html');
});

var clients = 0;

io.on('connection', function(socket){
	console.log('A user connected.');
	clients++;
	socket.emit('newClientConnect', 'Hey! Welcome');
	socket.broadcast.emit('newClientConnect', 'A user connected. Active users : '+clients);
	
	//setTimeout(function(){
		//default event
		//socket.send('Sent a message 4 seconds after the connection!');
		
		//custom event
		//socket.emit('testEvent', { description : 'This was a custom event!'});
	//}, 4000);
	
	//io.sockets.emit('broadcast', 'A user connected. Active users : '+clients);
	
	/* socket.on('clientEvent', function(data){
		console.log(data);
	}); */
	
	socket.on('disconnect', function(){
		clients--;
		//console.log('A user disconnected. Active users : '+clients);
		//io.sockets.emit('broadcast', 'A user disconnected. Active users : '+clients);
		socket.broadcast.emit('newClientConnect', 'A user disconnected. Active users : '+clients);
	});
});

var nsp = io.of('/namespace1');

nsp.on('connection', function($socket){
	console.log('someone connected');
	nsp.emit('hi', 'Hello Everyone!');
});

http.listen(3000, function(){
	console.log('listening on *:3000');
});