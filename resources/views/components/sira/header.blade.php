<header {{ $attributes->class(['bg-sira-petroleum px-5 py-4 text-white']) }}>
    <div class="mx-auto flex max-w-5xl items-center justify-between gap-4">
        <a href="{{ route('sira.dashboard') }}" class="text-sm font-semibold tracking-wide text-white no-underline">
            SIRA <span class="ml-1 font-normal text-emerald-100">GESTIÓN AMBIENTAL</span>
        </a>
        <span class="text-sm">{{ $slot }}</span>
        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-sm font-semibold text-white hover:text-emerald-100">Cerrar sesión</button>
            </form>
        @endauth
    </div>
</header>
