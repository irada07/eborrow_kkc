<?php
 
namespace App\Console\Commands;
 
use Illuminate\Console\Command;
use App\BorrowMaterial;
use App\BorrowGood;
 
class Update extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:status';
 
    /**
     * The console command description.
     *
     * @return void
     */
    protected $description = 'Update Status Borrow Material at 23:59';
 
    /**
     * Execute the console command.
     */
    public function __construct(){
        parent::__construct();
    }
    /**
     * The console command description.
     *
     * @return int
     */
     
    public function handle()
    {
        $borrowMaterial = BorrowMaterial::where('status',0)->update(['status'=>4]);
        $borrowGood = BorrowGood::where('status',0)->update(['status'=>4]);
        // $this->info("Success");
    }
}