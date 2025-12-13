# Admin Template

A premium React + TypeScript admin dashboard template built with Vite, Tailwind CSS, and modern development practices.

## Features

- ⚡ **Vite** - Lightning-fast build tool
- ⚛️ **React 18** - Latest React features
- 📘 **TypeScript** - Type-safe development
- 🎨 **Tailwind CSS** - Utility-first styling
- 🧭 **React Router v6** - Client-side routing
- 📊 **Recharts** - Data visualization
- 🏪 **Zustand** - State management
- 🎯 **Icons** - lucide-react icon library
- 📦 **class-variance-authority** - Component variants
- ✨ **ESLint & Prettier** - Code quality tools
- 🎭 **Stylelint** - CSS linting

## Quick Start

### Prerequisites
- Node.js 16+ 
- npm or yarn

### Installation

```bash
# Install dependencies
npm install

# Start development server
npm run dev
```

The app will be available at `http://localhost:5173`

## Available Scripts

```bash
# Development
npm run dev          # Start development server

# Building
npm run build        # Build for production
npm run preview      # Preview production build

# Code Quality
npm run lint         # Run ESLint
npm run lint:fix     # Fix ESLint issues
npm run format       # Format with Prettier
npm run type-check   # TypeScript type checking
```

## Project Structure

```
├── src/
│   ├── components/       # Reusable components
│   ├── layouts/          # Layout components
│   ├── pages/            # Page components
│   ├── store/            # Zustand stores
│   ├── data/             # Mock data
│   ├── config/           # Configuration
│   ├── styles/           # Global styles
│   ├── utils/            # Utilities
│   ├── types/            # TypeScript types
│   ├── hooks/            # Custom hooks
│   ├── docs/             # Documentation
│   ├── main.tsx          # Entry point
│   └── App.tsx           # Root component
├── index.html            # HTML template
├── vite.config.ts        # Vite configuration
├── tailwind.config.ts    # Tailwind configuration
├── tsconfig.json         # TypeScript configuration
└── package.json          # Dependencies
```

## Routes

- `/dashboard` - Main dashboard
- `/analytics` - Analytics & insights
- `/products` - Product management
- `/orders` - Order management
- `/customers` - Customer management
- `/settings` - Application settings

## Configuration

Create a `.env` file based on `.env.example`:

```env
VITE_API_URL=http://localhost:3000/api
VITE_API_TIMEOUT=30000
VITE_ENABLE_DEMO_MODE=true
VITE_ENABLE_ANALYTICS=false
VITE_APP_NAME="Admin Template"
VITE_APP_VERSION="1.0.0"
```

## Development

### Path Aliases

Use convenient import paths with aliases:

```typescript
import { Dashboard } from '@pages/Dashboard'
import { Sidebar } from '@components/Sidebar'
import { useAppState } from '@hooks/useAppState'
import ENV from '@config/env'
```

### State Management

Access global state with Zustand:

```typescript
import { useAppStore } from '@store/appStore'

const { user, theme, setTheme } = useAppStore()
```

### Styling

Add custom styles in `src/styles/index.css` using Tailwind's `@layer` directive:

```css
@layer components {
  .custom-button {
    @apply px-4 py-2 rounded-lg font-medium;
  }
}
```

## Building for Production

```bash
# Create optimized production build
npm run build

# Preview the production build locally
npm run preview
```

The build output will be in the `dist/` directory.

## Browser Support

- Chrome/Edge: Latest 2 versions
- Firefox: Latest 2 versions  
- Safari: Latest 2 versions
- Modern mobile browsers

## Code Quality

The project includes:
- **ESLint** - JavaScript/TypeScript linting
- **Prettier** - Code formatting
- **Stylelint** - CSS linting
- **TypeScript** - Type checking

Run checks:

```bash
npm run lint
npm run format
npm run type-check
```

## Environment Variables

| Variable | Default | Description |
|----------|---------|-------------|
| `VITE_API_URL` | `http://localhost:3000/api` | API endpoint |
| `VITE_API_TIMEOUT` | `30000` | API timeout in ms |
| `VITE_ENABLE_DEMO_MODE` | `true` | Enable demo mode |
| `VITE_ENABLE_ANALYTICS` | `false` | Enable analytics |
| `VITE_APP_NAME` | `Admin Template` | App name |
| `VITE_APP_VERSION` | `1.0.0` | App version |

## Performance

- Optimized bundle size
- Code splitting by route
- Lazy component loading
- Efficient state management
- Tailwind CSS purging

## Troubleshooting

### Port already in use
Edit `vite.config.ts` and change the `server.port` value.

### Module not found errors
Verify path aliases in both `tsconfig.json` and `vite.config.ts`.

### TypeScript errors
Run `npm run type-check` for a full type check.

## License

MIT

## Support

For issues, questions, or suggestions, please create an issue in the repository.

---

**Ready to build something amazing!** 🚀
