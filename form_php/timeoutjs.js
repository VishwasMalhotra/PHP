    var timeout = 110;
    var idleSeconds = 0;
    document.onclick = function() {
    idleSeconds = 0;
    };
    document.onmousemove = function() {
    idleSeconds = 0;
    };
    document.onkeypress = function() {
    idleSeconds = 0;
    };
    window.setInterval(CheckIdleTime, 1000);

    function CheckIdleTime() {
        idleSeconds++;
        if (idleSeconds >= timeout) {
        // alert("You were inactive for 15 seconds. You are being redirected to the home page.");
        document.location.href = "timeout.php";
        }
    }