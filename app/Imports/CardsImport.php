<?php

namespace App\Imports;

use App\Cards;
use Illuminate\Http\Request;
use App\Models\Card_Import\CardImport;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class CardsImport implements ToModel, WithHeadingRow,WithValidation,WithBatchInserts
{
    public $request;
    public function __construct(Request $request)
    {
        $this->request = $request; 
        
        //dd($request);
    }
    
    public function model(array $row)
    {
        //dd($row);
        return new CardImport([
                'card_number' => $row['cardno'],
                'card_u_i_d' => $row['carduid'],
                'order_number'    =>$this->request->order_number,
                'batch_no'    =>$this->request->batch_no,
                'status'    =>$this->request->status,
                'receive_date'    =>$this->request->receive_date,
                'received_by'    =>$this->request->received_by,
                'import_comment'    =>$this->request->import_comment,
            ]);
        
    }


    public function rules(): array
    {
        return [
            '*.cardno' => ['required', 'unique:cardimports,card_number']
        ];
    }

    public function batchSize(): int
    {
        return 1000;
    }

    
}
