<head>
  <title>Pusher Test</title>
  <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
  <script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('58813031c0a48ad19efc', {
      cluster: 'ap2'
    });

    var channel = pusher.subscribe('PrivateChannel1');
    console.log(channel);
    channel.bind('Notify', function(data) {
      alert(JSON.stringify(data));

    });
  </script>
</head>
<body>
  <h1>Pusher Test</h1>
  <p>
    Try publishing an event to channel <code>my-channel</code>
    with event name <code>my-event</code>.
  </p>
</body>