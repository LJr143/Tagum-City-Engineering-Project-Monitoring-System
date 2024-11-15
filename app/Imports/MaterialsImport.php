<?php

namespace App\Imports;

use App\Models\Material;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Log;

class MaterialsImport implements ToModel
{
    private static int $rowCount = 0; // Counter to track the number of rows processed
    private int $powId; // Store the pow_id to associate with materials

    private float $totalCost = 0;

    // Constructor to initialize pow_id
    public function __construct(int $powId)
    {
        $this->powId = $powId;
    }

    public function model(array $row)
    {
        self::$rowCount++; // Increment the counter for each row

        // Skip the header rows (1-8) and start from the 9th row
        if (self::$rowCount < 9) {
            return null; // Skip the first 8 rows
        }

        // Trim the values in the row to remove any leading or trailing spaces
        $row = array_map('trim', $row);

        Log::info('Processing row', $row);

        // Check if required fields are present
        if (is_null($row[0]) || is_null($row[1]) || is_null($row[2]) || is_null($row[3]) || is_null($row[4]) || is_null($row[6])) {
            Log::warning('Skipped row due to null values', $row);
            return null; // Skip the row if any required field is null
        }

        // Ensure that the item_no is an integer
        if (!is_numeric($row[0])) {
            Log::warning('Skipped row due to incorrect item_no format', $row);
            return null; // Skip the row if item_no is not a valid number
        }

        // Create a new Material instance and associate it with the pow_id
        $material = Material::create([
            'pow_id' => $this->powId, // Associate the material with the provided pow_id
            'item_no' => (int) $row[0], // Cast to integer
            'quantity' => (int) $row[1], // Assuming quantity is also an integer
            'unit_of_issue' => $row[2],
            'item_description' => $row[3],
            'estimated_unit_cost' => (float) $row[4], // Cast to float for decimal values
            'estimated_cost' => (float) $row[6], // Cast to float for decimal values
        ]);

        $this->totalCost += (float)$row[6];

        // Log the imported row
        Log::info('Imported material successfully', [
            'pow_id' => $material->pow_id,
            'item_no' => $material->item_no,
            'quantity' => $material->quantity,
            'unit_of_issue' => $material->unit_of_issue,
            'item_description' => $material->item_description,
            'estimated_unit_cost' => $material->estimated_unit_cost,
            'estimated_cost' => $material->estimated_cost,
        ]);

        return $material;
    }

    public function getTotalCost(): float
    {
        return $this->totalCost;
    }
}
