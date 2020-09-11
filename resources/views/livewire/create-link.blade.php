<div>
    <x-jet-validation-errors class="mb-4" />

    <div class="w-full flex flex-col sm:justify-center items-center bg-gray-100">
        <div class="w-full px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <form wire:submit.prevent="submit">
                <div>
                    <x-jet-label value="Original URL" />
                    <x-jet-input class="block mt-1 w-full" type="text" name="original" wire:model="original" :value="old('original')" required autofocus />
                </div>

                <div class="flex justify-end">
                    <x-jet-button class="mt-4 bg-green-500">Shorten</x-jet-button>
                </div>
            </form>
        </div>
    </div>
</div>