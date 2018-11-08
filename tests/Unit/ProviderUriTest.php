<?php

namespace Tests\Unit;

use Tests\TestCase;

class ProviderUriTest extends TestCase
{
    /**
     * @param \Illuminate\Foundation\Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('route-doc.uri', 'route-doc-test');
    }

    public function testDocumentationUriSetInEnvironment()
    {
        $response = $this->get('route-doc-test');
        $response->assertStatus(200);
    }
}
