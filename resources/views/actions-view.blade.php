<div class="flex  space-x-2" wire:key="user-{{ $row->id }}">
    <livewire:edit-user :userId="$row->id" :key="$row->id"/>
    <livewire:delete-user :userId="$row->id" :key="$row->id"/>
</div>
