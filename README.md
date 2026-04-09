# TestPilot

A web-based test runner that connects a Vue.js frontend with a Laravel backend to execute automated browser tests using Playwright and display results in real-time.

## Features

- **Playwright Test Runner** - Run Pest v4 + Playwright tests from the web interface
- **Real-time Results** - View test outcomes, duration, and detailed output
- **API Testing** - Built-in endpoint tester to verify frontend-backend connectivity
- **Vue.js + Laravel** - Modern full-stack architecture with clean separation

## Tech Stack

- **Frontend:** Vue 3 + TypeScript + Vite
- **Backend:** Laravel 13 (PHP 8.3+)
- **Testing:** Pest v4 (test runner) + Playwright (browser automation)
- **API:** Axios for HTTP requests

## Project Structure

```
TestPilot/
├── frontend/          # Vue.js application
│   ├── src/
│   │   ├── components/   # Vue components (PestTestRunner)
│   │   ├── views/       # Page views (Home, ApiTest)
│   │   ├── services/    # API service
│   │   └── router.ts   # Vue Router config
│   └── package.json
│
└── backend/           # Laravel application
    ├── routes/api.php   # API endpoints
    └── tests/          # Browser tests
```

## Getting Started

### Prerequisites

- Node.js 18+
- PHP 8.2+
- Composer
- Pestv4 + Playwright

### Installation

**Frontend:**
```bash
cd frontend
npm install
npm run dev
```

**Backend:**
```bash
cd backend
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

### Default Ports

- Frontend: `http://localhost:3000`
- Backend: `http://localhost:8000`

The frontend proxies `/api/*` requests to the backend.

## API Endpoints

| Method | Endpoint | Description |
|--------|----------|-------------|
| POST | `/api/run-pest-test` | Execute browser tests |

## License

MIT
