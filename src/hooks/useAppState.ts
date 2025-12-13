import { useAppStore } from '@store/appStore';

export function useAppState() {
  const user = useAppStore((state) => state.user);
  const theme = useAppStore((state) => state.theme);
  const sidebarOpen = useAppStore((state) => state.sidebarOpen);

  const setUser = useAppStore((state) => state.setUser);
  const setTheme = useAppStore((state) => state.setTheme);
  const toggleSidebar = useAppStore((state) => state.toggleSidebar);

  return {
    user,
    theme,
    sidebarOpen,
    setUser,
    setTheme,
    toggleSidebar,
  };
}
