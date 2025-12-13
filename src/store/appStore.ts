import { create } from 'zustand';

export interface User {
  id: string;
  name: string;
  email: string;
  role: string;
}

export interface AppState {
  user: User | null;
  theme: 'light' | 'dark';
  sidebarOpen: boolean;

  // Actions
  setUser: (user: User | null) => void;
  setTheme: (theme: 'light' | 'dark') => void;
  toggleSidebar: () => void;
}

export const useAppStore = create<AppState>((set) => ({
  user: {
    id: '1',
    name: 'Admin User',
    email: 'admin@example.com',
    role: 'Administrator',
  },
  theme: 'light',
  sidebarOpen: true,

  setUser: (user) => set({ user }),
  setTheme: (theme) => set({ theme }),
  toggleSidebar: () => set((state) => ({ sidebarOpen: !state.sidebarOpen })),
}));
