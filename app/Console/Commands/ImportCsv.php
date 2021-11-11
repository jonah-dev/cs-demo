<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Product;
use App\Models\Inventory;
use App\Models\Order;
use Rap2hpoutre\FastExcel\FastExcel;

class ImportCsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:csv {import_type}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import csv dataset given a model';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $import_type = $this->argument('import_type');
        $model = null;
        // Not elegant, but it'll do
        switch($import_type){
            case 'products':
                $model = Product::class;
                break;
            case 'users':
                $model = User::class; 
                break;
            case 'inventories':
                $model = Inventory::class;
                break;
            case 'orders':
                $model = Order::class;
                break;
            default:
                $this->info('Model not supported');
                return Command::FAILURE;
        }

        (new FastExcel)->import(storage_path("imports/$import_type.csv"), function ($line) use ($model) {
            $line = $this->cleanData($line);
            $rec = new $model();
            $rec->fill($line);
            return $rec->save();
        });

        return Command::SUCCESS;
    }

    private function cleanData(array $line): array
    {
        foreach($line as $key=>$value) {
            if ($value === "NULL") {
                $line[$key] = null;
            }
        }
        return $line;
    }
}
