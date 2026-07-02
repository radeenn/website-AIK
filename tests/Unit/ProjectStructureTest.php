<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ProjectStructureTest extends TestCase
{
    public function test_required_project_files_exist(): void
    {
        $root = dirname(__DIR__, 2);

        $this->assertFileExists($root.'/routes/web.php');
        $this->assertFileExists($root.'/database/seeders/KategoriGerakanSeeder.php');
        $this->assertFileExists($root.'/resources/views/home.blade.php');
    }
}
