@props([
    'valid' => true,
])



<div class="flex flex-wrap justify-center mt-10 ">
    @foreach($options as $key => $label)
        <div class="p-4 max-w-sm px-5 ">
            <div class="flex rounded-lg h-full dark:bg-gray-800 bg-teal-400 p-8 flex-col test">
                <div class="flex flex-col justify-between flex-grow">
                    <h2 class="text-white dark:text-white text-sm font-medium py-5 text-center">
                        {{ $label }}
                    </h2>
                    <p class="leading-relaxed text-red-500	">
                       Dimension : 10 x 10 x 10
                    </p>
                    <label class="py-2">

                        <x-filament::input.radio wire:model="primary_packaging" name="primary_packaging" />
                    </label>
                </div>
            </div>
        </div>
    @endforeach
</div>

<style>
    .test{
        min-width: 250px;
        text-align: center;
    }
    .leading-relaxed{
        color: #6d7f99;
        font-size: 11px;
    }
</style>
<script>
</script>
