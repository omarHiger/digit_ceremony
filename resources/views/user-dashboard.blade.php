<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('style.css') }}?v=1.0">
    <title>Digit ~ Opening Ceremony</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
{{--<x-slot name="header" class="bg-[var(--dark-bg)]">--}}
{{--    <link rel="stylesheet" href="{{ asset('style.css') }}?v=1.0">--}}
{{--    <title>Digit ~ Opening Ceremony</title>--}}
{{--    <div class="flex items-center justify-between ">--}}
{{--        <div class="flex items-center space-x-4">--}}
{{--            <img src="{{ asset('logo.png') }}" alt="Company Logo" class="w-12 h-12">--}}
{{--            <h1 class="text-2xl font-bold text-[var(--dark-text)]">ClickSync Dashboard</h1>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</x-slot>--}}

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
<audio id="countdownSound" src="{{asset('countdown.wav')}}" preload="auto"></audio>
</body>

{{--    <div class="min-h-screen bg-[var(--dark-bg)]">--}}
{{--        <main class="py-12 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">--}}
{{--            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8 items-stretch">--}}
{{--                <!-- Click Section -->--}}
{{--                <div class="bg-[var(--dark-bg)] rounded-2xl p-8 shadow-xl">--}}
{{--                    <h2 class="text-2xl font-bold text-[var(--dark-text)] mb-6">Synchronized Click</h2>--}}
{{--                    <button--}}
{{--                        onclick="handleClick()"--}}
{{--                        class="w-full py-4 bg-[var(--accent)] hover:bg-[#8a12d3] text-white font-bold rounded-xl transition-[var(--transition-standard)] transform hover:scale-[1.02] active:scale-95 flex items-center justify-center space-x-2"--}}
{{--                        id="clickButton"--}}
{{--                    >--}}
{{--                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"--}}
{{--                             aria-hidden="true">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>--}}
{{--                        </svg>--}}
{{--                        <span>Activate Sync</span>--}}
{{--                        <svg id="syncLoader" class="w-5 h-5 animate-spin hidden" xmlns="http://www.w3.org/2000/svg"--}}
{{--                             fill="none" viewBox="0 0 24 24">--}}
{{--                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"--}}
{{--                                    stroke-width="4"></circle>--}}
{{--                            <path class="opacity-75" fill="currentColor"--}}
{{--                                  d="M4 12a8 8 0 018-8v4l5-5-5-5v4a8 8 0 100 16z"/>--}}
{{--                        </svg>--}}
{{--                    </button>--}}
{{--                </div>--}}

{{--                <!-- Status Panel -->--}}
{{--                <div class="bg-white rounded-2xl p-8 shadow-xl bg-[var(--dark-bg)]">--}}
{{--                    <h2 class="text-2xl font-bold text-[var(--dark-text)] mb-6">Sync Status</h2>--}}
{{--                    <div id="response" class="space-y-6">--}}
{{--                        <div--}}
{{--                            class="flex items-center justify-between p-4  bg-[var(--accent)]  rounded-2xl p-8 shadow-xl rounded-lg">--}}
{{--                            <div class="space-y-1">--}}
{{--                                <h3 class="text-lg font-semibold text-[var(--light-text)]">Current Session</h3>--}}
{{--                                <p class="text-sm text-[var(--grey-dark)]" id="sessionTimer">Active for next 10--}}
{{--                                    seconds</p>--}}
{{--                            </div>--}}
{{--                            <div class="w-12 h-12 rounded-full bg-[var(--accent)]/10 flex items-center justify-center">--}}
{{--                                <svg class="w-6 h-6 text-[var(--accent)]" fill="none" stroke="currentColor"--}}
{{--                                     stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true">--}}
{{--                                    <path stroke-linecap="round" stroke-linejoin="round"--}}
{{--                                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>--}}
{{--                                </svg>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="grid grid-cols-2 gap-4 \">--}}
{{--                            <div class="p-4  bg-[var(--accent)]  rounded-lg text-center">--}}
{{--                                <p class="text-sm text-[var(--grey-dark)]">Total Users</p>--}}
{{--                                <p class="text-2xl font-bold text-[var(--light-text)]" id="totalUsers">0</p>--}}
{{--                            </div>--}}
{{--                            <div class="p-4  bg-[var(--accent)]  rounded-lg text-center">--}}
{{--                                <p class="text-sm text-[var(--grey-dark)]">Active Now</p>--}}
{{--                                <p class="text-2xl font-bold text-[var(--light-text)]" id="activeUsers">0</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="p-4  bg-[var(--accent)]  rounded-lg">--}}
{{--                            <div class="flex items-center justify-between mb-2">--}}
{{--                                <span class="text-sm text-[var(--grey-dark)]">Sync Progress</span>--}}
{{--                                <span class="text-sm font-semibold text-[var(--accent)]" id="progressText">0%</span>--}}
{{--                            </div>--}}
{{--                            <div class="h-2 bg-gray-200 rounded-full overflow-hidden">--}}
{{--                                <div id="progressBar"--}}
{{--                                     class="h-full bg-[var(--accent)] transition-[var(--transition-smooth)] rounded-full"--}}
{{--                                     style="width: 0%"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </main>--}}
{{--    </div>--}}

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

    countdownSound.load();

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
