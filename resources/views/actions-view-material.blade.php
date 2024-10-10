<div class="flex  space-x-2" wire:key="material-{{ $row->id }}">
    <livewire:edit-material :materialId="$row->id" :key="$row->id"/>
</div>
