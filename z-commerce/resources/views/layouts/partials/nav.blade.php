<nav class="menu">
        <img class="logo" src="{{asset('img/logo.svg')}}" alt="" >
<ul>

    <li> 
        <a href="{{route('home')}}"><svg width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1024 1024"><path fill="currentColor" d="M946.5 505L534.6 93.4a31.93 31.93 0 0 0-45.2 0L77.5 505c-12 12-18.8 28.3-18.8 45.3c0 35.3 28.7 64 64 64h43.4V908c0 17.7 14.3 32 32 32H448V716h112v224h265.9c17.7 0 32-14.3 32-32V614.3h43.4c17 0 33.3-6.7 45.3-18.8c24.9-25 24.9-65.5-.1-90.5z"/></svg></a>
    </li>

    <li> 
    <a href="{{route('wishlist')}}">
        @auth 
        <span class="info-count">{{count(auth()->user()->wishlist)}}</span>
        @endauth
        <svg width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 36 36"><path fill="currentColor" d="M23.66 10H15V8h7.78a7.42 7.42 0 0 1 .89-6H8a2 2 0 0 0-2 2v28a2 2 0 0 0 2 2h20a2 2 0 0 0 2-2V13.5a7.49 7.49 0 0 1-6.34-3.5ZM13 26h-2v-2h2Zm0-4h-2v-2h2Zm0-4h-2v-2h2Zm0-4h-2v-2h2Zm0-4h-2V8h2Zm12 16H15v-2h10Zm0-4H15v-2h10Zm0-4H15v-2h10Zm0-4H15v-2h10Z" class="clr-i-solid--badged clr-i-solid-path-1--badged"/><circle cx="30" cy="6" r="5" fill="currentColor" class="clr-i-solid--badged clr-i-solid-path-2--badged clr-i-badge"/><path fill="none" d="M0 0h36v36H0z"/></svg></a>
    </li>

    <li> 
        <a href="{{route('cart')}}"> <span class="info-count">{{session()->has('cart') ? count(session('cart')) : 0}}</span>
        <svg width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2"><path d="M5 7h13.79a2 2 0 0 1 1.99 2.199l-.6 6A2 2 0 0 1 18.19 17H8.64a2 2 0 0 1-1.962-1.608L5 7Z"/><path stroke-linecap="round" d="m5 7l-.81-3.243A1 1 0 0 0 3.22 3H2m6 18h2m6 0h2"/></g></svg>
</a>
    </li>

    <li> 
        <a href="{{route('account')}}"><svg width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 512 512"><path fill="currentColor" d="m448 362.7l-117.3-21.3C320 320 320 310.7 320 298.7c10.7-10.7 32-21.3 32-32c10.7-32 10.7-53.3 10.7-53.3c5.5-8 21.3-21.3 21.3-42.7s-21.3-42.7-21.3-53.3C362.7 32 319.2 0 256 0c-60.5 0-106.7 32-106.7 117.3c0 10.7-21.3 32-21.3 53.3s15.2 35.4 21.3 42.7c0 0 0 21.3 10.7 53.3c0 10.7 21.3 21.3 32 32c0 10.7 0 21.3-10.7 42.7L64 362.7C21.3 373.3 0 448 0 512h512c0-64-21.3-138.7-64-149.3z"/></svg></a>
    </li>
</ul>

    </nav>