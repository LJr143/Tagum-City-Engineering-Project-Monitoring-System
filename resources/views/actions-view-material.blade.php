<div class="flex space-x-1" wire:key="material-{{ $row->id }}">
    <livewire:edit-material :materialId="$row->id" :key="$row->id"/>
    <livewire:delete-material :materialId="$row->id" :key="$row->id"/>
</div>
