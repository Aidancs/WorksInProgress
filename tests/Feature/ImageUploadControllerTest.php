<?php

namespace Tests\Feature;

use App\Models\Image;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ImageUploadControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
    * A basic test example.
    *
    * @return void
    */
    public function testSaveTest()
    {
        $user = User::create([
            'name' => 'First Lastname',
            'email' => 'a@a.com',
            'password' => 'password',
        ]);
        
        $this->actingAs($user);
        $response = $this->post('image-upload', [
            'image_title' => 'Test Image Name',
            'image_location' => 'image.png'
        ]);
        dd($response);
        $image = Image::find($response->content());

        $this->assertNotNull($image);
        $this->assertEquals('Test Image Name', $image->only(['image_title']));
        $response->assertStatus(302)->assertRedirect();
    }
}
