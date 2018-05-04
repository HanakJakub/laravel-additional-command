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
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $strings = $this->argument('strings');

        $size = count($strings);

        $count = 0;
        foreach ($strings as $row) {
            for ($i = $count+1 ; $i <= $size-1; $i++) {
                $result[] = $strings[$count] . ' ' . $strings[$i];
            }
            $count++;
        }
        foreach ($result as $row) {
            $this->line($row);
        }
    }
}
