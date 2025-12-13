# Admin Template Documentation

Welcome to the Admin Template documentation. This guide will help you get started with the project structure, available features, and best practices.

## Quick Start

```bash
# Install dependencies
npm install

# Start development server
npm run dev

# Build for production
npm run build

# Preview production build
npm run preview
```

## Project Structure

```
src/
├── components/       # Reusable UI components
│   ├── Sidebar.tsx
│   ├── Header.tsx
│   └── StatCard.tsx
├── layouts/          # Layout components
│   └── DashboardLayout.tsx
├── pages/            # Page components
│   ├── Dashboard.tsx
│   ├── Analytics.tsx
│   ├── Products.tsx
│   ├── Orders.tsx
│   ├── Customers.tsx
│   ├── Settings.tsx
│   └── NotFound.tsx
├── store/            # Zustand stores
│   └── appStore.ts
├── data/             # Mock data modules
│   ├── dashboard.ts
│   ├── products.ts
│   ├── orders.ts
│   └── customers.ts
├── config/           # Configuration files
│   └── env.ts
├── styles/           # Global styles
│   └── index.css
├── utils/            # Utility functions
│   └── cn.ts
├── types/            # TypeScript type definitions
│   └── index.ts
├── hooks/            # Custom React hooks
│   └── useAppState.ts
├── main.tsx          # React entry point
└── App.tsx           # Root component with routing
```

## Available Routes

- `/dashboard` - Main dashboard with stats and charts
- `/analytics` - Analytics and traffic insights
- `/products` - Product management
- `/orders` - Order management and tracking
- `/customers` - Customer relationship management
- `/settings` - Application settings

## Configuration

Environment variables can be set in `.env` file. See `.env.example` for available options.

### Available Environment Variables

- `VITE_API_URL` - API endpoint URL (default: `http://localhost:3000/api`)
- `VITE_API_TIMEOUT` - API timeout in milliseconds (default: `30000`)
- `VITE_ENABLE_DEMO_MODE` - Enable demo mode (default: `true`)
- `VITE_ENABLE_ANALYTICS` - Enable analytics (default: `false`)
- `VITE_APP_NAME` - Application name
- `VITE_APP_VERSION` - Application version

## Styling

The project uses Tailwind CSS for styling. Custom styles should be added to `src/styles/index.css` using Tailwind's `@layer` directive.

### Tailwind Customization

Colors, fonts, and other theme values can be customized in `tailwind.config.ts`.

## State Management

The project uses Zustand for state management. Access the global app state using the `useAppStore` hook:

```typescript
import { useAppStore } from '@store/appStore'

function MyComponent() {
  const user = useAppStore((state) => state.user)
  const setTheme = useAppStore((state) => state.setTheme)
  
  return (...)
}
```

## Linting and Formatting

```bash
# Run ESLint
npm run lint

# Fix ESLint issues
npm run lint:fix

# Format code with Prettier
npm run format

# Type checking
npm run type-check
```

## Charts and Visualizations

The project uses Recharts for data visualization. See examples in `Dashboard.tsx` and `Analytics.tsx`.

## Adding New Pages

1. Create a new file in `src/pages/`
2. Import it in `src/App.tsx`
3. Add a route in the Routes component

Example:

```typescript
// src/pages/NewPage.tsx
export default function NewPage() {
  return (
    <div>
      <h1>New Page</h1>
    </div>
  )
}

// In src/App.tsx
import NewPage from '@pages/NewPage'

// Add route
<Route path="new-page" element={<NewPage />} />
```

## Adding New Components

1. Create a new file in `src/components/`
2. Use TypeScript interfaces for props
3. Follow existing component patterns

## Performance Tips

- Use React Router's code splitting for pages
- Leverage Zustand's selective subscriptions
- Optimize re-renders with memoization when needed
- Use lazy loading for images with Recharts components

## Browser Support

- Chrome/Edge: Latest 2 versions
- Firefox: Latest 2 versions
- Safari: Latest 2 versions
- Mobile browsers (iOS Safari, Chrome Mobile)

## Troubleshooting

### Port already in use
Change the port in `vite.config.ts` server configuration.

### Type errors
Run `npm run type-check` to see all TypeScript errors.

### Module not found
Ensure the path alias in `tsconfig.json` matches the import statement.

## Contributing

Follow the existing code style and patterns when adding new features.

## License

MIT
