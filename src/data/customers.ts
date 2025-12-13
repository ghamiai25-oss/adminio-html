export interface Customer {
  id: string;
  name: string;
  email: string;
  phone: string;
  joinDate: string;
  status: 'active' | 'inactive';
  orders: number;
  lifetime: number;
}

export const customers: Customer[] = [
  {
    id: '1',
    name: 'John Doe',
    email: 'john@example.com',
    phone: '+1 (555) 123-4567',
    joinDate: '2023-01-15',
    status: 'active',
    orders: 12,
    lifetime: 3299.88,
  },
  {
    id: '2',
    name: 'Jane Smith',
    email: 'jane@example.com',
    phone: '+1 (555) 234-5678',
    joinDate: '2023-06-20',
    status: 'active',
    orders: 8,
    lifetime: 1899.92,
  },
  {
    id: '3',
    name: 'Bob Johnson',
    email: 'bob@example.com',
    phone: '+1 (555) 345-6789',
    joinDate: '2022-11-10',
    status: 'active',
    orders: 25,
    lifetime: 7499.75,
  },
  {
    id: '4',
    name: 'Alice Brown',
    email: 'alice@example.com',
    phone: '+1 (555) 456-7890',
    joinDate: '2024-01-05',
    status: 'active',
    orders: 2,
    lifetime: 249.98,
  },
  {
    id: '5',
    name: 'Charlie Wilson',
    email: 'charlie@example.com',
    phone: '+1 (555) 567-8901',
    joinDate: '2023-03-12',
    status: 'inactive',
    orders: 5,
    lifetime: 999.95,
  },
  {
    id: '6',
    name: 'Diana Martinez',
    email: 'diana@example.com',
    phone: '+1 (555) 678-9012',
    joinDate: '2023-09-08',
    status: 'active',
    orders: 15,
    lifetime: 4499.85,
  },
];
