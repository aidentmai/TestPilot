<?php

namespace Tests\Browser;

test('moodle homepage', function () {
    $this->page->goto('https://school.moodledemo.net/');
    $title = $this->page->title();
    expect($title)->toContain('Mount Orange');
});

test('student can log in', function () {
    $this->page->goto('https://school.moodledemo.net/login/index.php');
    $this->page->waitForSelector('input#username', ['timeout' => 60000]);
    $this->page->locator('input#username')->fill('student');
    $this->page->locator('input#password')->fill('moodle25');
    $this->page->click('#loginbtn');
    sleep(3);
    $this->page->waitForLoadState('networkidle', ['timeout' => 60000]);
    $content = $this->page->content();
    expect($content)->toContain('Barbara');
});