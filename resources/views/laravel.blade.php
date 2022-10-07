<x-basic-layout>
    <x-slot name="title">
        This is a title
    </x-slot>

    <div class="mt-40">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png"
             alt="Laravel's Picture" width="80px" height="auto" class="inline-block">
        <h1 class="capitalize inline-block text-6xl text-red-500 font-semibold ml-4">Laravel</h1>
    </div>


    <table class="shadow-xl border border-grey-500 w-3/4 mt-8">
        <tr>
            <td class="border border-grey-500">
                <div class="p-6">
                    <h2 class="underline font-semibold text-black text-xl mb-4">Safety</h2>
                    <p class="text-gray-400 text-sm">
                        You want to know how safe our Website is? Luckly you are able to. Just add the name of the user
                        aboveright behind the /users/ in the URL and then go. Here an example:
                        <strong>127.0.0.1/users/Belle Eichmann</strong>
                    </p>
                </div>

            </td>
            <td class="border border-grey-500">
                <div class="p-6">
                    <h2 class="underline font-semibold text-black text-xl mb-4">All our Users</h2>
                    <p class="text-gray-400 text-sm">
                        To show how much we valuate our Users we decidet to show them all here
                        <strong>Some Users</strong>
                    </p>
                </div>
            </td>
        </tr>
        <tr class="rounded-bl-xl">
            <td class="border border-grey-500">
                <div class="p-6">
                    <h2 class="underline font-semibold text-black text-xl mb-4">Give us your Information</h2>
                    <p class="text-gray-400 text-sm">
                        Want to see what basic routing and Laravel can do? Just type in the URL search bar following
                        things:
                        <strong>127.0.0.1:8000/views/(your name)-(your age)</strong>
                    </p>
                </div>

            </td>
            <td class="border border-grey-500">
                <div class="p-6">
                    <h2 class="underline font-semibold text-black text-xl mb-4">Vibrant Ecosystem</h2>
                    <p class="text-gray-400 text-sm">
                        Laravel's robust library of first-party tools and libraries, such as Forge, Vapor, Nova, and
                        Envoyer help you take your projects to the next level.
                        Pair them with powerful open source libraries like Cashier, Dusk, Echo, Horizon, Sanctum,
                        Telescope, and more.
                    </p>
                </div>
            </td>
        </tr>
    </table>


</x-basic-layout>
