import { Bell, Settings, LogOut, User } from 'lucide-react';

export default function Header() {
  return (
    <header className="bg-white border-b border-gray-200 px-8 py-4">
      <div className="flex items-center justify-between">
        <div>
          <h2 className="text-lg font-semibold text-gray-900">Welcome Back</h2>
          <p className="text-sm text-gray-500">Here's what's happening in your business</p>
        </div>

        <div className="flex items-center gap-4">
          <button className="p-2 text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
            <Bell className="w-5 h-5" />
          </button>

          <div className="flex items-center gap-3 pl-4 border-l border-gray-200">
            <div className="text-right">
              <p className="text-sm font-medium text-gray-900">Admin User</p>
              <p className="text-xs text-gray-500">Administrator</p>
            </div>

            <div className="relative group">
              <button className="p-2 text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                <User className="w-5 h-5" />
              </button>

              <div className="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all">
                <button className="w-full flex items-center gap-2 px-4 py-2 text-gray-700 hover:bg-gray-50">
                  <Settings className="w-4 h-4" />
                  <span>Settings</span>
                </button>
                <button className="w-full flex items-center gap-2 px-4 py-2 text-gray-700 hover:bg-gray-50 border-t border-gray-200">
                  <LogOut className="w-4 h-4" />
                  <span>Sign Out</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
  );
}
