    var timeout = 100;
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
        var oPanel = document.getElementById("SecondsUntilExpire");
        if (oPanel)
        oPanel.innerHTML = (timeout - idleSeconds) + "";
        if (idleSeconds >= timeout) {
        // alert("You were inactive for 2 minutes. You are being redirected to the home page.");
        document.location.href = "timeout.php";
        }
    }