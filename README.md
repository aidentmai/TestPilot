# TestPilot

A web-based test runner that connects a Vue.js frontend with a Laravel backend to execute automated browser tests using Laravel Dusk and display results in real-time.

## Features

- **Browser Test Runner** - Run Laravel Dusk/Pest tests directly from the web interface
- **Real-time Results** - View test outcomes, duration, and detailed output
- **API Testing** - Built-in endpoint tester to verify frontend-backend connectivity
- **Vue.js + Laravel** - Modern full-stack architecture with clean separation

## Tech Stack

- **Frontend:** Vue 3 + TypeScript + Vite
- **Backend:** Laravel 12 (PHP)
- **Testing:** Laravel Dusk / Pest
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
- Laravel Dusk (for browser testing)

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
| GET | `/api/hello` | Health check |
| GET | `/api/status` | Application status |
| GET | `/api/items` | Sample data endpoint |
| POST | `/api/run-pest-test` | Execute browser tests |

## License

MIT