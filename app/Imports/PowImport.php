<?php

namespace App\Imports;

use App\Models\DirectCost;
use App\Models\IndirectCost;
use App\Models\OtherDirectCost;
use App\Models\Pow;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;

class PowImport implements ToModel
{
    private static int $rowCount = 0;
    private int $powId;
    private bool $stopImporting = false;

    private float $totalMaterialPow = 0;

    private float $totalMaterialsCost;

    public function __construct(int $powId)
    {
        $this->powId = $powId;
        $importMaterials = new MaterialsImport($this->powId);
        $this->totalMaterialsCost = $importMaterials->getTotalCost();
    }

    public function model(array $row)
    {
        self::$rowCount++;

        if ($this->stopImporting) {
            // Start importing indirect costs and other direct costs after detecting the "Total" row
            if ($this->isIndirectCostRow($row) || $this->isOtherDirectCostRow($row)) {
                // Import both indirect and other direct costs simultaneously
                return $this->importCostsSimultaneously($row);
            }
            Log::info('Importing stopped after "Total" row, but importing costs now');
            return null;
        }

        $row = array_map('trim', $row);

        Log::info('Processing row', $row);

        // Skip rows with null values
        if ($this->hasNullValues($row)) {
            Log::warning('Skipped row due to null values', $row);
            return null;
        }

        // Check if the row contains "Total" in the first column and stop importing
        if (str_contains(strtolower($row[0]), 'total')) {
            // Mark to stop importing further rows after this "Total" row
            $this->stopImporting = true;
            Log::info('Detected "Total" row, stopping direct cost import');
            return null; // Do not import the "Total" row itself
        }

        // Ensure that the item_no is an integer
        if (!is_numeric($row[4])) {
            Log::warning('Skipped row due to incorrect item_no format', $row);
            return null;
        }

        $row[2] = floatval(str_replace('%', '', $row[2]));
        $row[4] = floatval($row[4]);
        $row[8] = floatval($row[8]);
        $row[10] = floatval($row[10]);

        // Log after data cleanup
        Log::info('Inserting direct cost row with processed values:', [
            'pow_id' => $this->powId,
            'item_no' => $row[0],
            'description' => $row[1],
            '%_of_total' => $row[2],
            'quantity' => $row[4],
            'unit' => $row[7],
            'unit_cost' => $row[8],
            'total_cost' => $row[9],
        ]);


        // Proceed with importing direct costs
        return new DirectCost([
            'pow_id' => $this->powId,
            'item_no' => $row[0],
            'description' => $row[1],
            '%_of_total' => $row[2],
            'quantity' => $row[4],
            'unit' => $row[7],
            'unit_cost' => $row[8],
            'total_cost' => $row[10],
            'remaining_cost' => $row[10],
        ]);
    }

    /**
     * Check if the row has any null values in the critical columns.
     */
    private function hasNullValues(array $row): bool
    {
        return is_null($row[0]) || is_null($row[1]) || is_null($row[2]) || is_null($row[3])
            || is_null($row[4]) || is_null($row[6]) || is_null($row[7]) || is_null($row[8]) || is_null($row[9]);
    }

    /**
     * Check if the row should be treated as an indirect cost.
     */
    private function isIndirectCostRow(array $row): bool
    {
        return !is_null($row[4]) && is_numeric($row[10]) && $row[10] != 0;
    }

    /**
     * Check if the row should be treated as an other direct cost.
     */
    private function isOtherDirectCostRow(array $row): bool
    {
        return !is_null($row[0]) && !is_null($row[1]) && is_numeric($row[3]) && !empty($row[1] && !empty([$row[3]]));
    }

    /**
     * Import both indirect costs and other direct costs simultaneously after the "Total" row.
     */
    private function importCostsSimultaneously(array $row): array
    {
        $row[1] = trim($row[1]);
        $row[3] = floatval($row[3]);
        $row[4] = trim($row[4]);
        $row[10] = floatval($row[10]);

        // Handle Material Cost and Labor Cost
        $materialCost = $this->getMaterialCost($row);
        $laborCost = $this->getLaborCost($row);

        // If material cost exists, insert into OtherDirectCost
        if ($materialCost) {
            $otherDirectCost = new OtherDirectCost([
                'pow_id' => $this->powId,
                'description' => 'Material Cost',
                'amount' => $materialCost,
            ]);
            $otherDirectCost->save();
        }

        // If labor cost exists, update the labor_cost column in the project
        if ($laborCost) {
            $this->updateLaborCost($laborCost);
        }


        // Process indirect cost first
        $indirectCost = new IndirectCost([
            'pow_id' => $this->powId,
            'description' => $row[4],
            'amount' => $row[10],
        ]);

        // Process other direct cost
        $otherDirectCost = new OtherDirectCost([
            'pow_id' => $this->powId,
            'description' => $row[1],
            'amount' => floatval($row[3]),
        ]);

        Log::info('Inserting indirect cost and other direct cost simultaneously:', [
            'pow_id' => $this->powId,
            'indirect_cost_description' => $row[4],
            'indirect_cost_amount' => $row[10],
            'other_direct_cost_description' => $row[1],
            'other_direct_cost_amount' => $row[3],
        ]);

        // Return both models to be inserted
        return [$indirectCost, $otherDirectCost];
    }

    /**
     * Get the Material Cost from the row if available
     */
    private function getMaterialCost(array $row)
    {
        if (str_contains(strtolower($row[1]), 'material')) {
            $this->totalMaterialPow = floatval($row[3]);
            return floatval($row[3]);
        }
        return 0;
    }

    public function getTotalMaterialCost(): float
    {
        return $this->totalMaterialPow;
    }

    private function validateMaterialCost(): bool
    {
        // Compare current total material cost with the imported one
        return $this->totalMaterialPow === $this->totalMaterialsCost;
    }

    /**
     * Get the Labor Cost from the row if available
     */
    private function getLaborCost(array $row): float|int
    {
        // Add logic here to identify labor cost, for example:
        if (str_contains(strtolower($row[1]), 'labor')) {
            return floatval($row[3]);
        }
        return 0;
    }

    /**
     * Update the labor cost on the project
     */
    private function updateLaborCost(float $laborCost): void
    {
        $pow = Pow::find($this->powId);
        if ($pow) {
            $pow->total_labor_cost += $laborCost;
            $pow->save();
            Log::info('Labor cost updated for pow', ['pow_id' => $this->powId, 'labor_cost' => $pow->labor_cost]);
        }
    }
}
