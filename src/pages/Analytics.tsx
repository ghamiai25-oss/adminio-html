import {
  BarChart,
  Bar,
  XAxis,
  YAxis,
  CartesianGrid,
  Tooltip,
  Legend,
  ResponsiveContainer,
} from 'recharts';

const analyticsData = [
  { name: 'Monday', visitors: 4000, conversions: 240 },
  { name: 'Tuesday', visitors: 3000, conversions: 221 },
  { name: 'Wednesday', visitors: 2000, conversions: 229 },
  { name: 'Thursday', visitors: 2780, conversions: 200 },
  { name: 'Friday', visitors: 1890, conversions: 229 },
  { name: 'Saturday', visitors: 2390, conversions: 200 },
  { name: 'Sunday', visitors: 3490, conversions: 321 },
];

export default function Analytics() {
  return (
    <div className="space-y-6">
      <div>
        <h1 className="text-3xl font-bold text-gray-900">Analytics</h1>
        <p className="text-gray-600 mt-2">Detailed insights into your traffic and performance</p>
      </div>

      {/* Main Chart */}
      <div className="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <h2 className="text-lg font-semibold text-gray-900 mb-6">Weekly Performance</h2>
        <ResponsiveContainer width="100%" height={400}>
          <BarChart data={analyticsData}>
            <CartesianGrid strokeDasharray="3 3" />
            <XAxis dataKey="name" />
            <YAxis />
            <Tooltip />
            <Legend />
            <Bar dataKey="visitors" fill="#0ea5e9" />
            <Bar dataKey="conversions" fill="#10b981" />
          </BarChart>
        </ResponsiveContainer>
      </div>

      {/* Metrics Grid */}
      <div className="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div className="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
          <p className="text-sm font-medium text-gray-600">Avg. Session Duration</p>
          <p className="text-3xl font-bold text-gray-900 mt-2">3m 24s</p>
          <p className="text-sm text-green-600 mt-2">+12% vs last week</p>
        </div>
        <div className="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
          <p className="text-sm font-medium text-gray-600">Bounce Rate</p>
          <p className="text-3xl font-bold text-gray-900 mt-2">42.3%</p>
          <p className="text-sm text-red-600 mt-2">-5% vs last week</p>
        </div>
        <div className="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
          <p className="text-sm font-medium text-gray-600">Conversion Rate</p>
          <p className="text-3xl font-bold text-gray-900 mt-2">8.7%</p>
          <p className="text-sm text-green-600 mt-2">+3% vs last week</p>
        </div>
      </div>
    </div>
  );
}
