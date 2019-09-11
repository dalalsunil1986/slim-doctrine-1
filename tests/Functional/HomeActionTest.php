<?php

namespace Tests\Functional;

class HomeActionTest extends BaseTestCase
{
    public function testGetHomepage()
    {
        $response = $this->runApp('GET', '/');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('Vanildo Souto', (string)$response->getBody());
        $this->assertStringContainsString('vanildo.souto@gmail.com', (string)$response->getBody());
    }

    public function setUp() : void
    {
        parent::setUp();

        $user = new \App\Entity\User();
        $user->setName('Vanildo Souto');
        $user->setEmail('vanildo.souto@gmail.com');

        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
}
