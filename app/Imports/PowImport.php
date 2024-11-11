<?php

namespace App\Imports;

use App\Models\DirectCost;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;

class PowImport implements ToModel
{
    private static int $rowCount = 0;
    private int $powId;

    public function __construct(int $powId)
    {
        $this->powId = $powId;
    }

    public function model(array $row)
    {
        self::$rowCount++;

        $row = array_map('trim', $row);

        Log::info('Processing row', $row);

        if (is_null($row[0]) || is_null($row[1]) || is_null($row[2]) || is_null($row[3]) || is_null($row[4]) || is_null($row[6]) || is_null($row[7]) || is_null($row[8]) || is_null($row[9])) {
            Log::warning('Skipped row due to null values', $row);
            return null;
        }

        // Ensure that the item_no is an integer
        if (!is_numeric($row[4])) {
            Log::warning    ('Skipped row due to incorrect item_no format', $row);
            return null;
        }

        $row[2] = floatval(str_replace('%', '', $row[2]));
        $row[4] = floatval($row[4]);
        $row[8] = floatval($row[8]);
        $row[10] = floatval($row[10]);

        // Log after data cleanup
        Log::info('Inserting row with processed values:', [
            'pow_id' => $this->powId,
            'item_no' => $row[0],
            'description' => $row[1],
            '%_of_total' => $row[2],
            'quantity' => $row[4],
            'unit' => $row[7],
            'unit_cost' => $row[8],
            'total_cost' => $row[9],
        ]);

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
}
