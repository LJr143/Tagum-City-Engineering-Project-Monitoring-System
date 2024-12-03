<div class="flex space-x-1" wire:key="material-{{ $row->id }}">
    <livewire:edit-material :materialId="$row->id" :key="'edit-'.$row->id"/>
    <livewire:delete-material :materialId="$row->id" :key="'delete-'.$row->id"/>

</div>
