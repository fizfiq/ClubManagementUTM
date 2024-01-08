<?php

namespace App\Console\Commands\Utilities;

use Illuminate\Console\Command;

class StudentIdGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'utilities:generate-student-id';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a unique student ID';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $length = $this->ask('Enter the length of the student ID (default is 4):', 4);
        $studentId = static::generateStudentId($length);
        
        $this->info("Generated Student ID: $studentId");
    }

    /**
     * Generate a unique student ID.
     *
     * @param int $length
     * @return string
     */
    public static function generateStudentId($length = 4)
    {
        $id = rand(pow(10, $length - 1), pow(10, $length) - 1);
        return sprintf('%0' . $length . 'd', $id);
    }
}
