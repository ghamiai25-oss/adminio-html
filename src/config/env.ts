// Environment configuration with defaults
export const ENV = {
  API_URL: import.meta.env.VITE_API_URL || 'http://localhost:3000/api',
  API_TIMEOUT: parseInt(import.meta.env.VITE_API_TIMEOUT || '30000', 10),
  ENABLE_DEMO_MODE: import.meta.env.VITE_ENABLE_DEMO_MODE === 'true',
  ENABLE_ANALYTICS: import.meta.env.VITE_ENABLE_ANALYTICS === 'true',
  APP_NAME: import.meta.env.VITE_APP_NAME || 'Admin Template',
  APP_VERSION: import.meta.env.VITE_APP_VERSION || '1.0.0',
} as const;

export default ENV;
