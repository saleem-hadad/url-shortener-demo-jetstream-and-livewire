<x-jet-action-section>
    <x-slot name="title">
        {{ __('User plan') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Upgrade your plan and enjoy pro features.') }}
    </x-slot>

    <x-slot name="content">
        <h3 class="text-lg font-medium text-gray-900">
            {{ __('Your current plan is') }} <strong>{{ ucfirst($currentPlan) }}</strong>
        </h3>

        <div class="mt-5">
            @if($currentPlan == 'free')
                <x-jet-button type="button" wire:click="upgradeToPro" wire:loading.attr="disabled">
                    {{ __('Upgrade to pro') }}
                </x-jet-button>
            @else
                <x-jet-danger-button type="button" wire:click="cancelPro" wire:loading.attr="disabled">
                    {{ __('Cancel pro version') }}
                </x-jet-danger-button>
            @endif            
        </div>
    </x-slot>
</x-jet-action-section>
