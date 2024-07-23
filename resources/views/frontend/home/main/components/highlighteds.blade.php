<section class="w-11/12 mx-auto py-5">
    <div class="grid grid-cols-2 md:grid-cols-4">

        @if ($highlighteds->count())
            @foreach ($highlighteds as $highlighted)
                <div class="flex flex-col gap-3 items-center justify-center w-full">
                    <p class="text-[#0711E5] text-text52 font-bold font-inter w-full text-center">
                        {{ $highlighted->metrics }}
                    </p>
                    <p class="text-[#111111] text-text16 font-medium font-inter w-full md:w-1/2 text-center">
                        {{ $highlighted->highlighted }}
                    </p>
                </div>
            @endforeach
        @endif

    </div>
</section>
