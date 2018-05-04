<?php
namespace Hanak\ArtisanCommand\Commands;

use Illuminate\Console\Command;

class StringCombinations extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'string:combine';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create combinations of string pairs without repetition';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'string:combine {strings*}';

    /**
     * Array of strings from input
     *
     * @var array
     */
    protected $strings;

    /**
    * Create a new command instance.
    *
    * @param  array  $strings
    * @return void
    */
    public function __construct($strings)
    {
        parent::__construct();

        $this->strings = $strings;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $size = count($this->strings);

        $count = 0;
        foreach ($this->strings as $row) {
            for ($i = $count+1 ; $i <= $size-1; $i++) {
                $result[] = $this->strings[$count] . ' ' . $this->strings[$i];
            }
            $count++;
        }
        foreach ($result as $row) {
            $this->line($row);
        }
    }
}
