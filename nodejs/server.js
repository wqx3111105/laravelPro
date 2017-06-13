var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);
var redis = require('redis');
 
server.listen(6001);
io.on('connection', function (socket) {
 
  console.log("new client connected");
  var redisClient = redis.createClient();
  redisClient.subscribe('message');
 
 redisClient.psubscribe('*', function(err, count) {
    console.log(count);
});
  redisClient.on("pmessage", function(su,channel, message) {
    console.log(channel);
    console.log(message);

    message = JSON.parse(message);
    socket.emit(channel + ':' + message.event, message.data);
    console.log('send');
  });
 
  socket.on('disconnect', function() {
    redisClient.quit();
  });
 
});