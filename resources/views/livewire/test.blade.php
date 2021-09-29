<div>
    <h1 x-text="$wire.msg" x-data></h1>
    <h1>Test1</h1>
    <a href="{{route("test2")}}">Test2</a>
    <!-- Alpine Counter Component -->
    <div x-data>
        <h1 x-text="$wire.count"></h1>

        <button x-on:click="$wire.increment()">Increment</button>
    </div>







    <div x-data="{ open: false }">
        <button @click="open = true">Open Dropdown</button>

        <ul
            x-show="open"
            @click.away="open = false"
        >
            Dropdown Body
        </ul>
    </div>


</div>
