var WebSocketServer = require('ws').Server,
    wss = new WebSocketServer({port: 8080}),
    CLIENTS=[];
wss.on('connection', function(ws) {
    CLIENTS.push(ws);
    ws.on('message', function(message) {
        console.log('received: %s', message);
        sendAll(message);
    });
    ws.send("NEW CLIENT JOINED");
  ws.send('Connections:' + wss.clients.size);
  console.log("Server: a client connected")
});

// test function to send all clients
function sendAll (message) {
    for (var i=0; i<CLIENTS.length; i++) {
        CLIENTS[i].send("Message: " + message);
    }
}