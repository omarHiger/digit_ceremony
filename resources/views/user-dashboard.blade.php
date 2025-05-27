<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('style.css') }}?v=1.0">
    <title>Digit ~ Opening Ceremony</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <audio id="countdownSound" src="{{asset('countdown.wav')}}" preload="auto"></audio>
</head>
<body>
<div class="grid"></div>

<div class="warning"></div>

<div class="base">
    <button id="activate">
        <span></span>
    </button>
</div>

<div class="box opened" id="cover">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <span></span><span></span>
</div>

<div class="hinges"></div>

<div class="text">
    DIGIT -&thinsp;OPENING
</div>

<div id="panel">
    <div id="msg">Count Down For Opening</div>
    <div id="time">9</div>
    <span id="abort" hidden>ABORT</span>
    <span id="detonate">Welcome To Digit</span>
</div>

<div id="turn-off"></div>
<div id="closing"></div>

<div id="restart">Let's Digitalize the Future.</div>

<div class="confetti-container"></div>
</body>
<script src="https://js.pusher.com/8.4.0/pusher.min.js"></script>

<script>

    var theCount;
    var panel = document.getElementById("panel");
    var turnOff = document.getElementById("turn-off");
    var turnOffHor = document.getElementById("closing");
    var detonate = document.getElementById("detonate");
    var time = document.getElementById("time");
    var confettiContainer = document.querySelector('.confetti-container');
    var countdownSound = document.getElementById("countdownSound");

    Pusher.logToConsole = true;

    var pusher = new Pusher('ab4cc4e2fa02e285d567', {
        cluster: 'ap1'
    });

    function handleClick() {
        fetch('/click', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json'
            }
        })
            .then(response => response.json())
            .then(data => {
            });
    }

    fetch('/click')
        .then(response => response.json())


    function showConfetti() {
        const confetti = document.createElement('div');
        confetti.classList.add('confetti');
        confetti.style.left = Math.random() * 100 + 'vw';
        confetti.style.animationDuration = Math.random() * 3 + 2 + 's';
        confetti.style.backgroundColor = 'hsl(' + Math.random() * 360 + ', 100%, 50%)';
        confettiContainer.appendChild(confetti);

        setTimeout(() => {
            confetti.remove();
        }, parseFloat(confetti.style.animationDuration) * 1000);
    }

    function showCountDown() {
        time.innerText = time.innerText - 1;
        if (time.innerText == 0) {
            clearInterval(theCount);
            time.classList.add("crono");
            abort.classList.add("hide");
            detonate.classList.add("show");
            setTimeout(function () {
                turnOff.classList.add("close");
                turnOffHor.classList.add("close");
                restart.classList.add("show");
                for (let i = 0; i < 100; i++) {
                    showConfetti();
                }
            }, 1500);
        }
    }

    var cover = document.getElementById("cover");
    cover.addEventListener("click", function () {
        if (this.className == "box") this.classList.add("opened");
        else this.classList.remove("opened");
    });

    var btn = document.getElementById("activate");
    activate.addEventListener("click", function () {
        handleClick();
        this.classList.add("pushed");
    });

    const channel = pusher.subscribe('owner-channel');
    channel.bind('App\\Events\\AllUsersClicked', function (data) {
        setTimeout(function () {
            panel.classList.add("show");
            countdownSound.play();
            setTimeout(function () {
                theCount = setInterval(showCountDown, 1000);
            }, 1600);
        }, 500);
    });


    var abort = document.getElementById("abort");
    abort.addEventListener("click", function () {
        btn.classList.remove("pushed");
        panel.classList.remove("show");
        clearInterval(theCount);
        time.innerText = 9;
    });

    var restart = document.getElementById("restart");
    restart.addEventListener("click", function () {
        panel.classList.remove("show");
        turnOff.classList.remove("close");
        turnOffHor.classList.remove("close");
        abort.classList.remove("hide");
        detonate.classList.remove("show");
        cover.classList.remove("opened");
        btn.classList.remove("pushed");
        this.classList.remove("show");
        time.classList.remove("crono");
        time.innerText = 9;
    });

    setTimeout(function () {
        cover.classList.remove("opened");
    }, 100);
</script>
