<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

abstract class PlaywrightBrowserTestCase extends TestCase
{
    protected $context;
    protected $page;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->context = \Playwright\Playwright::chromium(['headless' => true]);
        $this->page = $this->context->newPage();
    }

    protected function tearDown(): void
    {
        if ($this->page) {
            $this->page->close();
        }
        if ($this->context) {
            $this->context->close();
        }
        parent::tearDown();
    }
}