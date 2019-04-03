<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use League\Csv\Writer;
use App\Transaction;
use Carbon\Carbon;

class transactionSum extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transaction:sum';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Save transaction sum';

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
     * @return mixed
     */
    public function handle()
    {
        $summ = Transaction::from(Carbon::yesterday()->startOfDay())->to(Carbon::yesterday()->endOfDay())->sum('amount');
        $csv  = Writer::createFromString();

        $csv->insertOne([$summ]);

        return file_put_contents(sprintf("storage/sum-%s.csv", time()), $csv->getContent());
    }

}
