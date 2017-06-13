

    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>

    <div class="container">
        <div class="row">
            看见什么
            <div class="col-lg-8 col-lg-offset-2" >
                <div id="messages" ></div>
            </div>
        </div>
    </div>
    <script>
        var socket = io('http://localhost:6001');
        socket.on('connection', function (data) {
            console.log(data);
        });
        socket.on('channel:App\\Events\\LoginEvent', function(message){
            console.log(message);
            alert(message);
        });
        console.log(socket);
    </script>
