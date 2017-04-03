<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\ImageService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FileServiceTest extends TestCase
{

    private $base64Data;

    /**
     * set up test environmemt
     */
    public function setUp()
    {
        parent::setUp();
        //1 x 1 Transparent PNG
        $this->base64Data = 'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNk+P+/HgAFhAJ/wlseKgAAAABJRU5ErkJggg==';
    }

    /**
     * Test file is created from the supplied base64 encoded string
     */
    public function testCreateFileFromBase64String()
    {
        $imageService = new ImageService();
        $result = $imageService->create($this->base64Data, 'testData/');
        $path = storage_path( 'app/testData/'.$result.'.png');
        $this->assertFileExists($path);
        unlink($path);
    }


    /**
     * Test Create fails when supplied with a non base64 encoded string
     */
    public function testFailsToCreateFileFromNonBase64String()
    {
        $imageService = new ImageService();
        $result = $imageService->create('x', 'testData/');
        $this->assertNotTrue($result);
    }
}
