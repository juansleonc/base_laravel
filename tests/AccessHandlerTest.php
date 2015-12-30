<?php

class AccessHandlerTest extends TestCase
{
    public function testCheck()
    {
        $this->assertTrue(
            AccessHandler::check('admin', 'editor'),
            'Admin users should have access to editor modules'
        );

        $this->assertTrue(
            AccessHandler::check('editor', 'user'),
            'Admin should have access to users modules'
        );

        $this->assertTrue(
            AccessHandler::check('admin', 'admin'),
            'Admin users should have access to admin modules'
        );

        $this->assertFalse(
            AccessHandler::check('user', 'admin'),
            'Users should not have access to admin modules, routes, etc.'
        );
    }
}