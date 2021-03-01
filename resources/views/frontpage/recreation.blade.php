<x-layouts.frontpage>
    
    {{-- ini untuk card list fitur--}}
    <section class="pb-20 bg-gray-300">
        <div class="container mx-auto px-4">
            {{-- ini card --}}
            <x-frontpage.feature-cards :recreations="$recreations" />
            {{-- /ini card --}}
        </div>
    </section>
    {{-- /ini untuk card list fitur--}}
</x-layouts.frontpage>