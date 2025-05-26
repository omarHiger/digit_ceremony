<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Owner Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id="notification" class="hidden p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg"></div>
        </div>
    </div>

    <script src="https://js.pusher.com/8.4.0/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('ab4cc4e2fa02e285d567', {
            cluster: 'ap1'
        });

        const channel = pusher.subscribe('owner-channel');
        channel.bind('App\\Events\\AllUsersClicked', function(data) {
            const notification = document.getElementById('notification');
            notification.textContent = 'All users clicked the button!';
            notification.classList.remove('hidden');
            setTimeout(() => notification.classList.add('hidden'), 10000);
        });
    </script>
</x-app-layout>
