import { DollarSign, TrendingUp, Users, ShoppingCart } from 'lucide-react';

export const dashboardStats = [
  {
    id: 'revenue',
    title: 'Total Revenue',
    value: '$45,231.89',
    change: 20.1,
    icon: DollarSign,
  },
  {
    id: 'sales',
    title: 'Total Sales',
    value: '1,234',
    change: 15.3,
    icon: ShoppingCart,
  },
  {
    id: 'customers',
    title: 'Active Customers',
    value: '573',
    change: 8.2,
    icon: Users,
  },
  {
    id: 'growth',
    title: 'Growth Rate',
    value: '12.5%',
    change: 5.4,
    icon: TrendingUp,
  },
];

export const chartData = [
  { name: 'Jan', value: 4000 },
  { name: 'Feb', value: 3000 },
  { name: 'Mar', value: 2000 },
  { name: 'Apr', value: 2780 },
  { name: 'May', value: 1890 },
  { name: 'Jun', value: 2390 },
  { name: 'Jul', value: 3490 },
  { name: 'Aug', value: 4200 },
  { name: 'Sep', value: 3800 },
  { name: 'Oct', value: 4100 },
  { name: 'Nov', value: 4500 },
  { name: 'Dec', value: 5200 },
];
