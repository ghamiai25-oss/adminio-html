export interface Order {
  id: string;
  customer: string;
  date: string;
  amount: number;
  status: 'pending' | 'completed' | 'cancelled';
}

export const orders: Order[] = [
  {
    id: 'ORD-001',
    customer: 'John Doe',
    date: '2024-01-15',
    amount: 299.99,
    status: 'completed',
  },
  {
    id: 'ORD-002',
    customer: 'Jane Smith',
    date: '2024-01-14',
    amount: 149.99,
    status: 'completed',
  },
  {
    id: 'ORD-003',
    customer: 'Bob Johnson',
    date: '2024-01-13',
    amount: 499.99,
    status: 'pending',
  },
  {
    id: 'ORD-004',
    customer: 'Alice Brown',
    date: '2024-01-12',
    amount: 99.99,
    status: 'completed',
  },
  {
    id: 'ORD-005',
    customer: 'Charlie Wilson',
    date: '2024-01-11',
    amount: 349.99,
    status: 'cancelled',
  },
];
