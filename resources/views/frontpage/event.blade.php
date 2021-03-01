<x-layouts.frontpage>
    {{-- hero section --}}
    <x-frontpage.hero/>
    {{-- end hero section --}}
    
    {{-- ini untuk card list fitur--}}
    <section class="pb-20 bg-gray-300">
        <div class="container mx-auto px-4">
            {{-- ini card --}}
            <x-frontpage.event-cards :events="$events" />
            {{-- /ini card --}}
        </div>
    </section>
    {{-- /ini untuk card list fitur--}}
</x-layouts.frontpage>