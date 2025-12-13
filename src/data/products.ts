export interface Product {
  id: string;
  name: string;
  price: number;
  stock: number;
  category: string;
  status: 'active' | 'inactive';
}

export const products: Product[] = [
  {
    id: '1',
    name: 'Wireless Headphones',
    price: 129.99,
    stock: 45,
    category: 'Electronics',
    status: 'active',
  },
  {
    id: '2',
    name: 'USB-C Cable',
    price: 19.99,
    stock: 120,
    category: 'Accessories',
    status: 'active',
  },
  {
    id: '3',
    name: 'Phone Case',
    price: 24.99,
    stock: 0,
    category: 'Accessories',
    status: 'inactive',
  },
  {
    id: '4',
    name: 'Screen Protector',
    price: 9.99,
    stock: 200,
    category: 'Accessories',
    status: 'active',
  },
  {
    id: '5',
    name: 'Portable Charger',
    price: 49.99,
    stock: 65,
    category: 'Electronics',
    status: 'active',
  },
];
