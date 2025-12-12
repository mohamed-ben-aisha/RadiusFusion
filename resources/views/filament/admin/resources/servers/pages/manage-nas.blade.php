<x-filament-panels::page>
    @if ($this->connectionFailed)
        @lang('Connection failed to the server. Please check the server credentials.')
    @else
        {{ $this->table }}
    @endif
</x-filament-panels::page>
