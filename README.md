# TestPilot - Automated QA Testing Platform

**Full-Stack QA Automation Engineer** | Vue.js + Laravel + Playwright

## Project Summary

Built a web-based automated testing platform that enables QA teams to execute, monitor, and analyze browser tests through a modern web interface. The system provides real-time test execution, structured results parsing, and comprehensive error reporting for debugging test failures.

## Key Achievements

- Developed end-to-end test automation using **Pest v4** test framework with **Playwright** browser automation
- Created real-time test runner with structured output parsing for pass/fail results and duration metrics
- Implemented API testing module to verify frontend-backend connectivity and endpoint health
- Reduced manual testing overhead by enabling browser tests to run directly from web interface
- Migrated from Laravel Dusk to Playwright for improved cross-browser compatibility and performance

## Technical Skills Demonstrated

### Automation & Testing
- **Playwright** - Browser automation, cross-browser testing, element interaction
- **Pest v4** - PHP testing framework, test assertions, test organization
- **Browser Testing** - Headless Chrome, page navigation, form interaction, wait states
- **Test Automation** - Automated test execution, result parsing, failure debugging

### Frontend Development
- **Vue 3** - Composition API, component-based architecture
- **TypeScript** - Type safety, interfaces, async/await
- **Vite** - Build tooling, hot module replacement
- **Axios** - HTTP client, API integration

### Backend Development
- **Laravel 13** - PHP framework, REST API development
- **PHP 8.3** - Modern PHP features, process execution
- **API Design** - RESTful endpoints, JSON responses

### DevOps & Tools
- **Git** - Version control, GitHub deployment
- **Composer** - PHP dependency management
- **npm** - JavaScript package management

## Test Implementation Example

```php
test('student login flow', function () {
    $this->page->goto('https://school.moodledemo.net/login');
    $this->page->locator('#username')->fill('student');
    $this->page->locator('#password')->fill('moodle25');
    $this->page->click('#loginbtn');
    $this->page->waitForLoadState('networkidle');
    expect($this->page->content())->toContain('Barbara');
});
```

## Tech Stack

| Category | Technology |
|----------|------------|
| Frontend | Vue 3, TypeScript, Vite, Axios |
| Backend | Laravel 13, PHP 8.3 |
| Testing | Pest v4, Playwright |
| Browser | Headless Chromium |

## Key Features

- **Automated Browser Testing** - Execute Playwright tests via API endpoint
- **Real-time Results** - View test outcomes, duration, assertion failures
- **API Endpoint Testing** - Built-in tester for frontend-backend validation
- **Web Interface** - Vue.js dashboard for test execution and monitoring
- **Error Debugging** - Detailed output parsing for test failures

## Project Structure

```
TestPilot/
├── frontend/          # Vue.js QA Dashboard
│   └── src/
│       ├── components/PestTestRunner.vue   # Test execution UI
│       ├── views/Home.vue                  # Main dashboard
│       └── views/ApiTest.vue               # API testing view
│
└── backend/           # Laravel API Server
    └── tests/
        └── Browser/MoodleTest.php          # Playwright test suite
```

## Running Tests

```bash
# Execute browser tests
php vendor/bin/pest --testsuite=Browser

# Run via web interface
POST /api/run-pest-test
```

---

**Keywords for Resume:** QA Automation, Test Automation, Playwright, Pest, Selenium Alternative, Browser Testing, End-to-End Testing, Vue.js, Laravel, PHP, TypeScript, Automated QA, Software Testing