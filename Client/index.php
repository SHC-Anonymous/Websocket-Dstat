<?php
    function isSiteAvailible($url){
    if(!filter_var($url, FILTER_VALIDATE_URL)){
        return false;
    }
    $curlInit = curl_init($url);
    curl_setopt($curlInit,CURLOPT_CONNECTTIMEOUT,10);
    curl_setopt($curlInit,CURLOPT_HEADER,true);
    curl_setopt($curlInit,CURLOPT_NOBODY,true);
    curl_setopt($curlInit,CURLOPT_RETURNTRANSFER,true);
    $response = curl_exec($curlInit);
    curl_close($curlInit);
    return $response?true:false;
}
?> 

Websocket Network Protocol
<h1 id="checker">Loading...</h1>

# Checker if the http server is online (BETA)
<?php
$URL = 'http://websocket.game-production.repl.co/'; // WEBSOCKET URL HERE (only if you have a http webserver with the websocket)
if(isSiteAvailible($URL)){
echo '<h1>Status: ONLINE</h1>';      
}else{
echo '<h1>Status: OFFLINE</h1>'; 
}
?>  

<script>
var msg = "Loading...";
setInterval(function() {
const socket = new WebSocket('wss://websocket.game-production.repl.co'); // WEBSOCKET URL HERE
socket.addEventListener('open', function (event) {
console.log('Client: Connected to server') });
socket.addEventListener('message', function (event) {
console.log('Server: ', event.data);
document.getElementById("checker").innerHTML = event.data; });
setTimeout(function() { socket.close(); }, 4500); // close connections after 4.5 seconds
}, 1000); 
</script>