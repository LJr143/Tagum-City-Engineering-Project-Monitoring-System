<div class="flex justify-content-center align-items-center">
    <!-- Approve Button -->
    <button
        wire:click="approveProject({{ $project->id }})"
        class="text-xs text-center bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded flex items-center space-x-2 mr-2">
        <i class="fas fa-check mr-1"></i>
        Approve
    </button>

    <!-- Deny Button -->
    <button
        wire:click="denyProject({{ $project->id }})"
        class="text-xs text-center bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded flex items-center space-x-2">
        <i class="fas fa-times mr-1"></i>
        Deny
    </button>

    <script>
        document.addEventListener('marked-complete-approve', () => {
            location.reload();
        });

        document.addEventListener('marked-complete-deny', () => {
            location.reload();
        });
    </script>
</div>
