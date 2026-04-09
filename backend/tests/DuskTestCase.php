<?php

namespace Tests;

use Laravel\Dusk\TestCase as BaseTestCase;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver()
    {
        return RemoteWebDriver::create(
            'http://localhost:50615',
            DesiredCapabilities::chrome()->setCapability(
                ChromeOptions::CAPABILITY,
                (new ChromeOptions)->addArguments([
                    '--disable-gpu',
                    '--window-size=1920,1080',
                ])
            )
        );
    }

    /**
     * Get the base URL for the application.
     *
     * @return string
     */
    protected function baseUrl()
    {
        return 'https://school.moodledemo.net/';
    }
}
