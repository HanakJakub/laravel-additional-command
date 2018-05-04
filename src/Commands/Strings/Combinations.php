<?php
namespace Hanak\ArtisanCommand\Commands\Strings;

use Illuminate\Console\Command;

class Combinations extends Command
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
     * Array of strings from the input
     *
     * @var array
     */
    protected $strings;

    /**
     * Array of string pairs
     *
     * @var array
     */
    protected $result;

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->prepareStrings();

        if ($this->strings->count() == 1) {
            return $this->error('Type more than one string divided by comma or blank space!');
        }

        if ($this->strings->count() >= 10) {
            return $this->error('Type less than 10 strings');
        }

        $this->getResult();
        
        $this->result->each(function ($row) {
            $this->line($row);
        });

        $this->line('');
        $this->line("Number of valid strings: {$this->strings->count()}");
        $this->line("Number of pairs combination whitout repetition: {$this->result->count()}");
    }

    /**
     * Prepare strings array for creating result
     *
     * @return void
     */
    public function prepareStrings()
    {
        $this->strings = collect($this->argument('strings'));

        if ($this->strings->count() == 1) {
            $this->strings = trim($this->strings[0], ',');
            $this->strings = collect(explode(',', $this->strings));
        }

        $this->strings = $this->strings->unique()->values();
    }

    /**
     * Create result array
     *
     * @return void
     */
    public function getResult()
    {
        $size = count($this->strings);

        $count = 0;
        foreach ($this->strings as $row) {
            for ($i = $count+1 ; $i <= $size-1; $i++) {
                $this->result[] = $this->strings[$count] . ' ' . $this->strings[$i];
            }
            $count++;
        }

        $this->result = collect($this->result);
    }
}
