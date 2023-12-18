<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\ProjectImporterData;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class ProjectImporter implements ToModel, WithHeadingRow, WithCalculatedFormulas
{
    public function model(array $row)
    {
        return new ProjectImporterData([
            // 'ref' => $row['ref'],
            // 'block_order' => $row['block_order'],
            // 'section_order' => $row['section_order'],
            // 'question_order' => $row['question_order'],
            // 'block_name' => $row['block_name'],
            // 'section_name' => $row['section_name'],
            // 'question_ai' => $row['question_ai'],
            // 'question' => $row['question'],
            // 'prompt_name' => $row['prompt_name'],
            // 'prompt' => $row['prompt'],
            // 'strategy_document_output' => $row['strategy_document_output'],
            // 'project_type_name' => $row['project_type_name'],
            // 'project_type_slug' => $row['project_type_slug'],
            // 'block_slug' => $row['block_slug'],
            // 'section_slug' => $row['section_slug'],
            // 'project_type_description' => $row['project_type_description'],
        ]);
    }
}
