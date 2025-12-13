import { BrowserRouter, Routes, Route, Navigate } from 'react-router-dom';
import DashboardLayout from '@layouts/DashboardLayout';
import Dashboard from '@pages/Dashboard';
import Analytics from '@pages/Analytics';
import Products from '@pages/Products';
import Orders from '@pages/Orders';
import Customers from '@pages/Customers';
import Settings from '@pages/Settings';
import NotFound from '@pages/NotFound';

function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<DashboardLayout />}>
          <Route index element={<Navigate to="/dashboard" replace />} />
          <Route path="dashboard" element={<Dashboard />} />
          <Route path="analytics" element={<Analytics />} />
          <Route path="products" element={<Products />} />
          <Route path="orders" element={<Orders />} />
          <Route path="customers" element={<Customers />} />
          <Route path="settings" element={<Settings />} />
          <Route path="*" element={<NotFound />} />
        </Route>
      </Routes>
    </BrowserRouter>
  );
}

export default App;
