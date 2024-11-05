<!-- resources/views/livewire/admin-report.blade.php -->
<div>
    <!-- Filter Section -->
    <div class="flex space-x-4 mb-4">
        <div class="w-1/3">
            <label class="font-bold mb-1 block text-[12px]" for="baranggay">Baranggay</label>
            <select wire:model="filters.baranggay" class="block w-full border border-gray-300 rounded p-2">
                <option value="">Select Baranggay</option>
                @foreach($this->datasource()->pluck('baranggay')->unique() as $baranggay)
                    <option value="{{ $baranggay }}">{{ $baranggay }}</option>
                @endforeach
            </select>
        </div>

        <div class="w-1/3">
            <label class="font-bold mb-1 block" for="status">Status</label>
            <select wire:model="filters.status" class="block w-full border border-gray-300 rounded p-2">
                <option value="">Select Status</option>
                @foreach($this->datasource()->pluck('status')->unique() as $status)
                    <option value="{{ $status }}">{{ $status }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div>
        {{ $this->table() }}
    </div>
</div>
